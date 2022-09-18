<?php

namespace App\Http\Requests;

use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Http\FormRequest;

class EquipmentsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'price'=>'required',
            'image'=>'required',
            'size'=>'required',
            'short_desc'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Tên thiết bị không được trống!',
            'price.required'=>'Mức giá không được trống!',
            'image.required'=>'Ảnh không được trống!',
            'size.required'=>'Kích thước không được trống!',
            'short_desc.required'=>'Mô tả không được trống!'
        ];
    }
}
