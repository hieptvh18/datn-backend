<?php

namespace App\Http\Controllers\Specialist;

use App\Http\Controllers\Controller;
use App\Http\Requests\SpecialistRequest;
use App\Models\Specialist;
use App\Models\SpecialistGallery;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SpecialistController extends Controller
{
    public function index()
    {
        $specialists = Specialist::paginate(15);

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

            return redirect()->back()->with('msg-suc', 'Tạo thành công chuyên khoa mới.');
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
            return redirect()->back()->with('msg-suc', 'Cập nhật thành công chuyên khoa mới.');
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
                return redirect()->back()->with('msg-suc', 'Xóa thành công chuyên khoa.');
            }
            return redirect()->back()->with('msg-err', 'Xóa không thành công chuyên khoa.');
        } catch (Exception $e) {
            report($e->getMessage());
            return redirect()->back()->with('exception', 'Có lỗi xảy ra, vui lòng thử lại sau!');
        }
    }
}
