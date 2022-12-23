<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>'required|min:3|max:255',
            'type_id'=>'required',
            'price'=>'required|numeric',
            'image'=>'nullable|sometimes|image|nullable|mimes:jpg,png,jpeg|max:2040',
            'nsx'=>'required|date|date_format:Y-m-d',
            'hsd'=>'required|date|date_format:Y-m-d',

        ];
    }

    public function messages()
    {
        return [
            'name.required'=>':attribute không được để trống',
            'name.min'=>'Nhập ít nhât :min kí tư',
            'name.max'=>'Nhập tối đa :max kí tư',
            'type_id.required'=>'Tên loại không được để trống',
            'price.required'=>':attribute không được để trống',
            'price.numeric'=>':attribute phải là số',
            'image.image'=>':attribute phải là file ảnh',
            'image.mimes'=>':attribute phải là file ảnh jpg, png hoặc jpeg',
            'nsx.required'=> ':attribute không được để trống',
            'nsx.date'=> ':attribute không hợp lệ',
            'nsx.date_format'=> ':attribute không hợp lệ',
            'hsd.required'=> ':attribute không được để trống',
            'hsd.date'=> ':attribute không hợp lệ',
            'hsd.date_format'=> ':attribute không hợp lệ',

        ];
    }

    public function attributes()
    {
        return [
            'name'=>'Tên sản phẩm',
            'type_id'=>'Tên loại sản phẩm',
            'price'=>'Giá sản phẩm',
            'image'=>'Ảnh sản phẩm',
            'nsx'=>'Ngày sản xuất',
            'hsd'=>'Hạn sử dụng',

        ];
    }
}
