<?php

namespace App\Http\Controllers\Backend\Specialist;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialistRequest;
use App\Models\Specialist;
use App\Models\SpecialistGallery;
use Exception;

class SpecialistController extends Controller
{
    public function index()
    {
        $specialists = Specialist::sortable()->orderby('id', 'desc')->paginate(15);
        return view('pages.specialist.list', compact('specialists'));
    }

    public function add()
    {
        $pageTitle = 'Thêm mới chuyên khoa';
        return view('pages.specialist.add', compact('pageTitle'));
    }

    public function save(SpecialistRequest $request)
    {

        try {
            $specialist = new Specialist();
            $specialist->fill($request->all());
            if (!$request->is_active) $specialist->is_active = 0;
            $specialist->save();

            // save upload multiple image to gallery specialist
            if ($request->hasFile('image')) {
                $files = $request->file('image');
                foreach ($files as $image) {
                    $specialistGallery = new SpecialistGallery();
                    $specialistGallery->specialist_id = $specialist->id;
                    $prefixImg = 'specialist';

                    // upload file
                    $specialistGallery->path = fileUploader($image, $prefixImg, 'uploads/specialist');
                    $specialistGallery->save();
                }
            }

            return redirect()->back()->with('message', 'Tạo thành công chuyên khoa mới.');
        } catch (Exception $e) {
            report($e->getMessage());
            return back()->with('exception', 'Có lỗi xảy ra, vui lòng thử lại sau!');
        }
    }

    public function edit($id)
    {
        if ($id && Specialist::find($id)) {
            $pageTitle = 'Chỉnh sửa chuyên khoa';
            $specialist = Specialist::where('id', $id)->with('galleries')
                ->first();
            return view('pages.specialist.edit', compact('specialist', 'pageTitle'));
        }
        return redirect()->back()->with('exception', 'Không tìm thấy chuyên khoa!');
    }

    public function update(SpecialistRequest $request, $id)
    {
        try {
            $specialist = Specialist::find($id);
            $specialist->fill($request->all());
            if (!$request->is_active) $specialist->is_active = 0;
            $specialist->save();

            // save upload multiple image to gallery specialist
            if ($request->hasFile('image')) {
                $files = $request->file('image');
                foreach ($files as $image) {
                    $specialistGallery = new SpecialistGallery();
                    $specialistGallery->specialist_id = $specialist->id;
                    $prefixImg = 'specialist';

                    // upload file
                    $specialistGallery->path = fileUploader($image, $prefixImg, 'uploads/specialist');
                    $specialistGallery->save();
                }
            }
            return redirect()->back()->with('message', 'Cập nhật thành công chuyên khoa.');
        } catch (Exception $e) {
            report($e->getMessage());
            return back()->with('exception', 'Có lỗi xảy ra, vui lòng thử lại sau!');
        }
    }

    public function delete($id)
    {
        try {
            if (Specialist::find($id)) {
                $specialistGallery = SpecialistGallery::where('specialist_id', $id)->get();

                // delete list image saved in storage
                foreach ($specialistGallery as $item) {
                    if (file_exists(public_path($item->path))) {
                        unlink(public_path($item->path));
                    }
                }
                Specialist::destroy($id);
                return redirect()->back()->with('message', 'Xóa thành công chuyên khoa.');
            }
            return redirect()->back()->with('msg-err', 'Xóa không thành công chuyên khoa.');
        } catch (Exception $e) {
            report($e->getMessage());
            return redirect()->back()->with('exception', 'Có lỗi xảy ra, vui lòng thử lại sau!');
        }
    }

    // search
    public function search (){
        $key = $_GET['key'];
        $search_text = trim($key);

        try {
            if($search_text == null){
             return redirect()->route('specialist.index');
            }else {
            $specialists=Specialist::sortable()->where('id','LIKE', '%'.$search_text.'%')
            ->orwhere('specialist_name','LIKE', '%'.$search_text.'%')
            ->orwhere('function','LIKE', '%'.$search_text.'%')
            ->orwhere('description','LIKE', '%'.$search_text.'%')
            ->paginate(15);
        }

        return view('pages.specialist.list', compact('specialists'));
        } catch (\Throwable $th) {
            report($th->getMessage());
            return redirect()->back()->with('exception', 'Có lỗi xảy ra, vui lòng thử lại sau!');
        }
    }

}
