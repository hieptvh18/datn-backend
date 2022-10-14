<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImportRequset extends FormRequest
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
            'file'=> 'required|mimes:xlsx'
        ];
    }

    public function messages()
    {
        return [
            'file.required'=>'Vui lòng chọn tệp!',
            'file.mimes'=>'Tệp phải là tệp thuộc loại: .xlsx!',
        ];
    }
}
