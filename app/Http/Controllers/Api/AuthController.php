<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $options = ['phone' => $request->phone, 'password' => $request->password];
            $user = User::where('phone', $request->phone)->first();
            if ($user) {
                if (Auth::attempt($options)) {
                    if (isset($request->remember) == 'on') {
                        $days = time() + 60 * 60 * 24 * 30; // time 30 days
                        Cookie::queue('emailCookie', $request->email, $days);
                        Cookie::queue('passwordCookie', $request->password, $days);
                        return response()->json([
                            'success' => true,
                            'message' => 'Thông tin tài khoản sđt ' . $request->phone,
                            'data' => $user
                        ]);
                    } else {
                        return response()->json([
                            'success' => true,
                            'message' => 'Thông tin tài khoản sđt ' . $request->phone,
                            'data' => $user
                        ]);
                    }
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Mật khẩu sai!',
                        'data' => []
                    ]);
                }
            }
            return response()->json([
                'success' => false,
                'message' => 'Số điện thoại không tồn tại!',
                'data' => []
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Đã xảy ra lỗi! ' . $th->getMessage(),
                'data' => []
            ]);
        }
    }
}
