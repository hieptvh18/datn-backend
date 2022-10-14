<?php

namespace App\Http\Controllers\Backend\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\Admin;
use App\Models\NewCategory;
use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listNews = News::paginate(15);
        return view('pages.news.list', compact('listNews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listNewCategory = NewCategory::select('id', 'category_name')->get();
        $listAuthor = Admin::select('id', 'fullname')->get();
        return view('pages.news.create', compact('listNewCategory', 'listAuthor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
       try {
        $tag = implode(',', $request->tags);
        $news = new News();
        $news->fill($request->all());
        $news->tags = $tag;
        $news->save();

        if($request->hasFile('image')){
            $files = $request->file('image');
            foreach($files as $image) {
                $news_image = new NewsImage();
                $news_image->news_id = $news->id;
                $news_image->image = fileUploader($image, 'newsImage', 'uploads/newsImages');
                $news_image->save();
            }
        }

        return redirect()->route('news.index')->with('message', 'Tạo mới bài viết thành công!');
       } catch (\Throwable $th) {
        report($th->getMessage());
            return redirect()->back()->with('exception', 'Đã xảy ra lỗi!'.$th->getMessage());
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
        $news = News::find($id);
        $listNewCategory = NewCategory::select('id', 'category_name')->get();
        $listAuthor = Admin::select('id', 'fullname')->get();
        $newsImages = NewsImage::where('news_id', $id)->get();
        return view('pages.news.edit', compact('listNewCategory', 'listAuthor', 'news', 'newsImages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {

        try {
            $tag = implode(',', $request->tags);
            $newsImages = NewsImage::where('news_id', $id)->get();
            $news = News::find($id);
            $news->title = $request->title;
            $news->content = $request->content;
            $news->news_category = $request->news_category;
            $news->author_id = $request->author_id;
            $news->tags = $tag;
            $news->update();

            if($request->hasFile('image')){

               if($newsImages !== null || $newsImages !== ''){
                foreach($newsImages as $newImage){
                    $newImage->delete();
                }
               }
                $files = $request->file('image');
                foreach($files as $image) {
                    $news_image = new NewsImage();
                    $news_image->news_id = $news->id;
                    $news_image->image = fileUploader($image, 'newsImage', 'uploads/newsImages');
                    $news_image->save();
                }
            }

            return redirect()->route('news.index')->with('message', 'Cập nhật bài viết thành công!');
        } catch (\Throwable $th) {
            report($th->getMessage());
            return redirect()->back()->with('exception', 'Đã xảy ra lỗi!'.$th->getMessage());
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
            $news = News::find($id);
            $newsImages = NewsImage::where('news_id', $news->id)->get();
            foreach($newsImages as $newImage){
                $newImage->delete();
            }
            $news->delete();
            return redirect()->route('news.index')->with('message', 'Xóa bài viết thành công!');
        } catch (\Throwable $th) {
            report($th->getMessage());
            return redirect()->back()->with('exception', 'Đã xảy ra lỗi!'.$th->getMessage());
        }
    }
}
