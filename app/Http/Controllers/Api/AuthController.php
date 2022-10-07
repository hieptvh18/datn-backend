<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login (Request $request) {
       try {
        $options = ['phone'=>$request->phone, 'password'=>$request->password];
        $user = User::where('phone', $request->phone)->first();
        if($user){
            if(Auth::attempt($options)){
                return response()->json([
                    'success'=>true,
                    'message'=>'Thông tin tài khoản sđt '.$request->phone,
                    'data'=>$user
                ]);
            }else{
                return response()->json([
                    'success'=>false,
                    'message'=>'Mật khẩu sai!',
                    'data'=>[]
                ]);
            }
        }
        return response()->json([
            'success'=>false,
            'message'=>'Số điện thoại không tồn tại!',
            'data'=>[]
        ]);
       } catch (\Throwable $th) {
        return response()->json([
            'success'=>false,
            'message'=>'Đã xảy ra lỗi! '.$th->getMessage(),
            'data'=>[]
        ]);
       }
    }
}
