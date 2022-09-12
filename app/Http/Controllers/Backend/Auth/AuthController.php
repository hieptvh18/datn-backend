<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function getLogin()
    {
        return view('pages.auth.login');
    }


    public function postLogin(LoginRequest $request)
    {
        $user = Admin::where('email', $request->email)->first();
        if ($user) {
            if ($user->is_active == '1') {
                if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => 1])) {
                    return redirect()->route('dashboard');
                } elseif (!Auth::guard('admin')->attempt(['password' => $request->password])) {
                    return redirect()->route('getLogin')->withInput($request->only('email', 'remember'))->with(['error' => 'Mật khẩu không chính xác!']);
                }
            } else {
                return redirect()->route('getLogin')->withInput($request->only('email', 'remember'))->with(['error' => 'Tài khoản của bạn chưa được kích hoạt!']);
            }
        } else {
            return redirect()->route('getLogin')->withInput($request->only('email', 'remember'))->with(['error' => 'Email không tồn tại!']);
        }

        return redirect()->back();
    }

    public function getRegister()
    {
        return view('pages.auth.register');
    }


    public function postRegister(RegisterRequest $request)
    {

        $admin = new Admin();
        $admin->fill($request->all());
        $admin->is_active = 1;
        $admin->room_id = 1;
        $admin->level_id = 1;
        $admin->specialist_id = 1;
        $admin->password = Hash::make($request->password);
        $admin->save();

        $admin->role_admins()->attach($request->role_id);

        return redirect()->route('getLogin')->with(['message' => 'Tạo tài khoản thành công!']);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('getLogin');
    }
}
