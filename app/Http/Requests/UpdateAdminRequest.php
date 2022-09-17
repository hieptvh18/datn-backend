<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdminRequest extends FormRequest
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
            'email'=>["regex:/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/"],
            'email'=>'required|min:5|max:50|email',
            'fullname'=>'required|min:10|max:30',
            'phone'=>["required","min:10","max:11", "regex:/^(84|0[2|3|5|7|8|9])+([0-9]{8,9})$\b/"],
            'is_active'=>'required',
            'room_id'=>'required',
            'level_id'=>'required',
            'specialist_id'=>'required',
            'role_id'=>'required',
            'password'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Email không được trống!',
            'email.min'=>'Email tối thiểu 5 ký tự!',
            'email.max'=>'Email tối đa 50 ký tự!',
            'email.email'=>'Email không đúng định dạng!',
            'email.regex'=>'Email không đúng định dạng!',
            'fullname.required'=>'Họ và tên không được trống!',
            'fullname.min'=>'Họ và tên tối thiểu 10 ký tự!',
            'fullname.max'=>'Họ và tên tối đa 30 ký tự!',
            'phone.required'=>'SĐT không được trống!',
            'phone.min'=>'SĐT tối thiểu 10 ký tự số!',
            'phone.max'=>'SĐT tối đa 11 ký tự số!',
            'phone.regex'=>"Số điện thoại không đúng định dạng!",
            'is_active.required'=>'Trạng thái không được trống!',
            'room_id.required'=>'Phòng ban không được trống!',
            'level_id.required'=>'Chức vụ không được trống!',
            'specialist_id.required'=>'Chuyên khoa không được trống!',
            'role_id.required'=>'Vai trò không được trống!',
            'password.required'=>'Mật khẩu không được trống!',
        ];
    }
}
