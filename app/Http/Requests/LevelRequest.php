<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LevelRequest extends FormRequest
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
            'name' => 'required|min:5',
            'description' => 'required|min:30'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Tên chức vụ không được trống!',
            'name.min'=>'Nhập ít nhất :min ký tự!',
            'description.required'=>'Mô tả không được trống!',
            'description.min'=>'Nhập ít nhất :min ký tự!'
        ];
    }
}
