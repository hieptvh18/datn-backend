<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function list()
    {
        try {
            $listService = Service::select('id', 'service_name', 'price', 'parent_id')->where('is_active',1)->get();
            return response()->json([
                'success' => true,
                'message'=> 'Danh sách dịch vụ',
                'data' => $listService->toArray()
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
