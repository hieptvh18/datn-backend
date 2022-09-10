<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'fullname'=>'required|min:5|max:30',
            'email'=>'required|min:5|max:30|email|unique:admins',
            'phone'=>'required|min:10|max:11',
            'password'=>'required|min:8|max:20',
            'confirmPassword'=>'required|same:password',
        ];
    }
}
