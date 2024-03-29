<?php

namespace App\Http\Controllers\Backend\Level;

use App\Http\Controllers\Controller;
use App\Http\Requests\LevelRequest;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelsController extends Controller
{

    public function index()
    {
        $levels = Level::orderBy('id', 'desc')->paginate(5);
        return view('pages.level.list', compact('levels'))->with('i', (request()->input('page', 1) -1)*5);
    }


    public function add()
    {
        $pageTitle = 'Thêm mới chức vụ';
        return view('pages.level.add', compact('pageTitle'));
    }

    public function save(LevelRequest $request)
    {

        $level = new Level();

        $level->fill($request->all());

        $level->save();

        return redirect()->route('level.index');
    }

    public function delete(Level $id)
    {
        if($id->delete()) {
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        if ($id && Level::find($id)) {
            $pageTitle = 'Chỉnh sửa chức vụ';
            $level = Level::where('id', $id)->first();
            return view('pages.level.edit', compact('level', 'pageTitle'));
        }
        return redirect()->back()->with('excep', 'Không tìm thấy chức vụ!');
    }

    public function update(LevelRequest $request, $id) {

        $level = Level::find($id);
        $level->fill($request->all());

        $level->save();
        return redirect()->route('level.index');
    }


    public function deleteMultiple (Request $request){
        Level::whereIn('id', $request->get('data'))->delete();
        return response("Xóa thành công!", 200);
    }

    // search
    public function search (){
        $key = $_GET['key'];

        $search_text = trim($key);

        try {
            if($search_text == null){
             return redirect()->route('level.index');
            }else {
            $levels=Level::where('id','LIKE', '%'.$search_text.'%')
            ->orwhere('name','LIKE', '%'.$search_text.'%')
            ->orwhere('description','LIKE', '%'.$search_text.'%')
            ->paginate(15);
        }

        return view('pages.level.list', compact('levels'))->with('i', (request()->input('page', 1) -1)*5);
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
