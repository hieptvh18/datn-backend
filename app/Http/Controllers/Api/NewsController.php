<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\NewCategory;
use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    // new list
    public function list()
    {
        try {
            $listNews = News::with(['news_newCategory' => function ($query) {
                $query->select('id', 'category_name');
            }])->with(['news_author' => function ($query) {
                $query->select('id', 'fullname');
            }])->with(['imageNews' => function ($query) {
                $query->select('id', 'news_id', 'image');
            }])->get(['id', 'title', 'news_category', 'author_id', 'content', 'tags', 'created_at']);
            return response()->json([
                'success' => true,
                'message' => 'Danh sách tin tức',
                'data' => $listNews->toArray(),
            ]);
        } catch (\Throwable $th) {
            report($th->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Đã xảy ra lỗi!' . $th->getMessage(),
                'data' => []
            ],500);
        }
    }

    // news detail
    public function detail($newId)
    {
        try {
            $news = News::where('id', $newId)->with(['news_newCategory' => function ($query) {
                $query->select('id', 'category_name');
            }])->with(['news_author' => function ($query) {
                $query->select('id', 'fullname');
            }])->with(['imageNews' => function ($query) {
                $query->select('id', 'news_id', 'image');
            }])->first(['id', 'title', 'news_category', 'author_id', 'content', 'tags', 'created_at']);
            return response()->json([
                'success' => true,
                'message' => 'Chi tiết tin tức',
                'data' => $news,
            ]);
        } catch (\Throwable $th) {
            report($th->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Đã xảy ra lỗi!' . $th->getMessage(),
                'data' => []
            ]);
        }
    }
}
