<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class LevelRequest extends FormRequest
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
        $ruleNameUnique = Rule::unique('levels', 'name');

        if($request->method() == 'PUT'){
            $ruleNameUnique = Rule::unique('levels', 'name')->ignore(request()->id);
        }
        $rules = [
            'name' => ['required', 'min:6', 'max:155', $ruleNameUnique]
        ];
        return $rules;
    }

    public function messages(){
        return [
            'name.required'=>'Tên chức vụ không được trống!',
            'name.unique'=>'Tên chức vụ đã tồn tại mời bạn nhập tên khác!',
            'name.min'=>'Nhập ít nhất :min ký tự!',
            'name.max'=>'Nhập nhiều nhất :max ký tự!'
        ];
    }
}
