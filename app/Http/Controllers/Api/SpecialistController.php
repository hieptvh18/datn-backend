<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Specialist;
use Illuminate\Http\Request;
use Throwable;

class SpecialistController extends Controller
{
    // list chuyen khoa
    public function index(){
        try {
            $listSpecialist = Specialist::where('is_active',1)->get();
            return response()->json([
                'success' => true,
                'message'=> 'Danh sách chuyên khoa',
                'data' => $listSpecialist->toArray()
            ]);
        } catch (\Throwable $th) {
            report($th->getMessage());
            return response()->json([
                'success' => false,
                'message'=> 'Đã xảy ra lỗi!'.$th->getMessage(),
                'data' => []
            ]);
        }
    }
}
