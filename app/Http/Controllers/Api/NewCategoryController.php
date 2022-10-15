<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\NewCategory;
use Illuminate\Http\Request;

class NewCategoryController extends Controller
{
    public function list () {

       try {
        $listNewCategory = NewCategory::select('category_name', 'category_image', 'description')->get();
        return response()->json([
            'success'=>true,
            'message'=>'Danh sách danh mục tin tức',
            'data'=> $listNewCategory->toArray()
        ]);
       } catch (\Throwable $th) {
        report($th->getMessage());
        return response()->json([
            'success'=>false,
            'message'=>'Đã xảy ra lỗi!' .$th->getMessage(),
            'data'=> []
        ]);
       }
    }
}
