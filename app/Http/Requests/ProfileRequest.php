<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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

            'fullname'=>'required|min:10|max:30',
        ];
    }

    public function messages()
    {
        return [

            'fullname.required'=>'Họ và tên không được trống!',
            'fullname.min'=>'Họ và tên tối thiểu 10 ký tự!',
            'fullname.max'=>'Họ và tên tối đa 30 ký tự!',

        ];
    }
}
