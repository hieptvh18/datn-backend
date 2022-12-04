<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WebSetting;
use Illuminate\Http\Request;

class WebsettingController extends Controller
{
    public function websetting () {
        try {
            $websetting = WebSetting::where('id', 1)->first(['logo', 'web_name', 'base_url', 'phones', 'email', 'facebook_url', 'twitter_url', 'instagram_url', 'youtobe_url', 'address', 'open_time', 'close_time', 'start_date', 'end_date', 'short_introduce', 'introduce',]);
            return response()->json([
                'success' => true,
                'message'=> 'Thông tin phòng khám',
                'data' => $websetting
            ], 200);
        } catch (\Throwable $th) {
            report($th->getMessage());
            return response()->json([
                'success' => false,
                'message'=> 'Đã xảy ra lỗi!'.$th->getMessage(),
                'data' => []
            ], 500);
        }
    }
}
