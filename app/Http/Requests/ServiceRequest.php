<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
    public function rules(Request $request)
    {
        $ruleNameUnique = Rule::unique('services', 'service_name');
        // \dd($request->method() == 'PUT');\

        if($request->method() == 'PUT'){
            $ruleNameUnique = Rule::unique('services', 'service_name')->ignore($this->route()->parameter('service'));
        }
        return [
            'service_name' => ['required','min:6','max:255',$ruleNameUnique],
            'price' => 'numeric|
                        required',
            'image'=>'image|mimes:jpg,png,jpeg|max:2040'
        ];
    }
    public function messages()
    {
        return [
            'service_name.required' => ':attribute không được để trống',
            'service_name.min'=>'Nhập ít nhât :min kí tư',
            'service_name.max'=>'Nhập tối đa :max kí tư',
            'service_name.unique' => ':attribute đã tồn tại',
            'price.numeric' => ':attribute phải là số',
            'price.required' => ':attribute không được để trống',
            'image.image'=>':attribute phải là file ảnh',
            'image.mimes'=>':attribute phải là file ảnh jpg, png hoặc jpeg',
            'image.max' => 'Kích thước ảnh không lớn quá :max'

        ];
    }
    public function attributes()
    {
        return [
            'service_name'=>'Tên dịch vụ',
            'price'=>'Giá dịch vụ',
            'image'=>'Ảnh dịch vụ'
        ];
    }
}
