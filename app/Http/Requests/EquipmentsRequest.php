<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EquipmentsRequest extends FormRequest
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
    public function rules(Request $request)
    {
        $ruleNameUnique = Rule::unique('equipments', 'name');

        if($request->method() == 'PUT'){
            $ruleNameUnique = Rule::unique('equipments', 'name')->ignore(request()->id);
        }
        $rules = [
            'name' => ['required', 'min:6', 'max:155', $ruleNameUnique],
            'price' => 'required|integer',
            'size' => 'required',
            'short_desc' => 'required|min:30',
            'image' => 'image|mimes:jpg,png,jpeg|max:2040'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'=>'Tên thiết bị không được trống!',
            'name.unique'=>'Tên thiết bị đã tồn tại mời bạn nhập tên khác!',
            'name.min'=>'Nhập ít nhất :min ký tự!',
            'name.max'=>'Nhập tối đa :max ký tự!',
            'price.required'=>'Mức giá không được trống!',
            'price.integer'=>'Dữ liệu nhập vào phải là số nguyên!',
            'image.required'=>'Ảnh không được trống!',
            'size.required'=>'Kích thước không được trống!',
            'short_desc.required'=>'Mô tả không được trống!',
            'short_desc.min'=>'Nhập ít nhất :min ký tự!'
        ];
    }
}
