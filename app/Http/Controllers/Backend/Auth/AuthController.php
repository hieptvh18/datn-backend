<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Admin;
use App\Models\Password_reset;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
                    if(isset($request->remember) == 'on'){
                        $days = time() + 60 * 60 * 24 * 30; // time 30 days
                        Cookie::queue('emailCookie', $request->email, $days);
                        Cookie::queue('passwordCookie', $request->password, $days);
                        return redirect()->route('dashboard');
                    }else{
                       Cookie::queue(Cookie::forget('emailCookie'));
                         Cookie::queue(Cookie::forget('passwordCookie'));
                        return redirect()->route('dashboard');
                    }
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

    // forgot password
    public function getForgotPassword(){
        return view('pages.auth.passwords.email');
    }

    public function postForgotPassword(ForgotPasswordRequest $request){
        $token = strtoupper(Str::random(8));
        $admin = Admin::select("id","email")->where('email', $request->email)->first();
        Mail::send('pages.auth.passwords.sendMailForgotPassword',compact('admin', 'token'),function($sendMail) use ($admin, $token) {
            $sendMail->subject('Quên mật khẩu');
            $sendMail->to($admin->email, $admin->id);
        });

        return redirect()->route('getLogin')->with(['message'=>"Đã gửi mail thành công!"]);
    }

    public function getChangePassword($id){
        $admin = Admin::find($id);
        return view('pages.auth.passwords.confirm', compact('admin'));
    }

    public function postChangePassword(ChangePasswordRequest $request, $id){
        $admin = Admin::find($id);
        $now = new DateTime();
        $nowFormat = $now->format('Y-m-d H:i:s');
        $admin->password = Hash::make($request->password);
        $admin->update();
        $token = new Password_reset();
        $token->fill($request->all());
        $token->email = $admin->email;
        $token->timestamps = $nowFormat;
        $token->save();
        return redirect()->route('getLogin')->with(['message'=> "Đã đặt lại mật khẩu thành công!"]);
    }
}
