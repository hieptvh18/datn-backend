<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SpecialistRequest extends FormRequest
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
        // check method => ignore validate unique
        $ruleNameUinique = Rule::unique('specialists', 'specialist_name');
        if($request->method() == 'PUT'){
            $ruleNameUinique = Rule::unique('specialists', 'specialist_name')->ignore(request()->id);
        }
        $rules = [
            'specialist_name' => ['required', 'min:6', 'max:255', $ruleNameUinique],
            'function' => 'required|min:24',
            'image.*' => 'image|mimes:jpg,png,jpeg|max:2040'
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'specialist_name.required' => ':attribute không được bỏ trống.',
            'function.required' => ':attribute không được để trống.',
            'specialist_name.min' => 'Nhập ít nhất :min kí tự',
            'specialist_name.max' => 'Nhập tối đa :max kí tự',
            'function.min' => 'Nhập ít nhất :min kí tự',
            'specialist_name.unique' => 'Tên chuyên khoa đã tồn tại, vui lòng nhập tên khác.',
        ];
    }

    // custom attribute
    public function attributes()
    {
        return [
            'specialist_name' => 'Tên chuyên khoa',
            'function' => 'Chức năng',
            'image' => 'Hình ảnh'
        ];
    }
}
