<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePermissionRequest extends FormRequest
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
        $id = $this->request->get('id');
        return [
            'permission_name'=>['required'],
            'permission_name'=>[Rule::unique('permissions')->ignore($id, 'id')],
            'childrent'=>'required|min:1',
        ];
    }
    public function messages()
    {
        return [
            'permission_name.required'=>'Vui lòng chọn module!',
            'permission_name.unique'=>'Module này đã tồn tại!',
            'childrent.required'=>'Vui lòng chọn tối thiểu 1 hành động của module!',
            'childrent.min'=>'Vui lòng chọn tối thiểu 1 hành động của module!',
        ];
    }
}
