<?php

namespace App\Http\Controllers\Backend\NewCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewCategoryRequets;
use App\Http\Requests\updateNewCategoryRequets;
use App\Models\NewCategory;
use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Http\Request;

class NewCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listNewCategory = NewCategory::paginate(15);
        return view('pages.newCategories.list', compact('listNewCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.newCategories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewCategoryRequets $request)
    {
      try {
        $newCategory = new NewCategory();
        $newCategory->fill($request->all());
        if ($request->hasFile('category_image')) {
            $file = $request->file('category_image');
            $newCategory->category_image = fileUploader($file, 'newCategory', 'uploads/newCategories');
        } else {
            $newCategory->category_image = 'assets/img/profile-photos/no-image.png';
        }
        $newCategory->save();

        return redirect()->route('newCategories.index')->with('message', 'Tạo danh mục tin tức thành công!');
      } catch (\Throwable $th) {
        report($th->getMessage());
        return redirect()->back()->with('exception', 'Đã xảy ra lỗi!' . $th->getMessage());
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $newCategory = NewCategory::find($id);
        return view('pages.newCategories.edit', compact('newCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateNewCategoryRequets $request, $id)
    {
       try {
        $newCategory = NewCategory::find($id);

        $newCategory->category_name = $request->category_name;
        if ($request->hasFile('category_image')) {
            $file = $request->file('category_image');
            $newCategory->category_image = fileUploader($file, 'newCategory', 'uploads/newCategories');
        }
        $newCategory->description = $request->description;
        $newCategory->update();

        return redirect()->route('newCategories.index')->with('message', 'Cập nhật danh mục tin tức thành công!');
       } catch (\Throwable $th) {
        report($th->getMessage());
        return redirect()->back()->with('exception', 'Đã xảy ra lỗi!' . $th->getMessage());
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
try {
    $newCategory = NewCategory::find($id);
    $news = News::where('news_category', $id)->get();
    foreach($news as $new){
        $newsImage = NewsImage::where('news_id', $new->id)->get();
        foreach($newsImage as $img){
            $img->delete();
        }
        $new->delete();
    }
    $newCategory->delete();
    return redirect()->route('newCategories.index')->with('message', 'Xóa danh mục tin tức thành công!');
} catch (\Throwable $th) {
    report($th->getMessage());
    return redirect()->back()->with('exception', 'Đã xảy ra lỗi!' . $th->getMessage());
}
    }
}
