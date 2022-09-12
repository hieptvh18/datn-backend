<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'service_name' => 'required',
            'price' => 'numeric|
                        required',
        ];
    }
    public function messages()
    {
        return [
            'service_name.required' => 'Không thể để trống tên dịch vụ',
            'price.numeric' => 'Không đúng định dạng',
            'price.required' => 'Không thể để trống giá'
        ];
    }
}
