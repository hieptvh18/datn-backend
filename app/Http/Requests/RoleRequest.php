<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'role_name'=>'required|min:3|max:70',
            'permission_id'=>'required|min:1'
        ];
    }
    public function messages()
    {
        return [
            'role_name.required'=>'Tên vai trò không được trống!',
            'role_name.min'=>'Tên vai trò tối thiểu 3 ký tự!',
            'role_name.max'=>'Tên vai trò tối đa 70 ký tự!',
            'permission_id.required'=>'Vui lòng chọn tối thiểu 1 quyền cho vai trò!',
            'permission_id.min'=>'Vui lòng chọn tối thiểu 1 quyền cho vai trò!'
        ];
    }
}
