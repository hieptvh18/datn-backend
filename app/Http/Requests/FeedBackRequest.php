<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedBackRequest extends FormRequest
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
            'customer_name'=>['required'],
            'customer_email'=>["regex:/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/"],
            'customer_email'=>['required', 'email'],
            'content'=>['required'],
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required'=>'Vui lòng nhập họ tên!',
            'customer_email.required'=>'Vui lòng nhập email!',
            'customer_email.email'=>'Email không đúng định dạng!',
            'customer_email.regex'=>'Email không đúng định dạng!',
            'content.required'=>'Vui lòng nhập nội dung!',
        ];
    }
}
