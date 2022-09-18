<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'password'=>'required|min:8|max:20',
            'confirmPass'=>'required|same:password',
            'token'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'password.required'=>'Vui lòng nhập mật khẩu mới!',
            'password.min'=>'Mật khẩu mới tối thiểu :min ký tự!',
            'password.max'=>'Mật khẩu mới tối đa :max ký tự!',
            'confirmPass.required'=>'Vui lòng xác nhận mật khẩu mới!',
            'confirmPass.same'=>'Xác nhận mật khẩu mới không đúng!',
            'token.required'=>'Vui lòng nhập mã xác nhận đã được gửi!'
        ];
    }
}
