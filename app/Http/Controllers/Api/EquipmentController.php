<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Equipment;

class EquipmentController extends Controller
{
    public function list()
    {
        try {
            $listEquip = Equipment::query()->get(['id', 'name', 'price', 'image', 'size', 'short_desc']);
            return response()->json([
                'success' => true,
                'message' => 'Danh sách trang thiết bị',
                'data' => $listEquip->toArray()
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
}
