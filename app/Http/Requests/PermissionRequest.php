<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'parent'=>'required',
            'childrent'=>'required|min:1',
        ];
    }
    public function messages()
    {
        return [
            'parent.required'=>'Vui lòng chọn module!',
            'childrent.required'=>'Vui lòng chọn tối thiểu 1 hành động của module!',
            'childrent.min'=>'Vui lòng chọn tối thiểu 1 hành động của module!',
        ];
    }
}
