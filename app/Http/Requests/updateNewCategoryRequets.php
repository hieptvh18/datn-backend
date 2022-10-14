<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class updateNewCategoryRequets extends FormRequest
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
        $id = $this->request->get('id');
        return [
            'category_name'=>['required', 'min:5', 'max:50'],
            'category_name'=>[Rule::unique('news_categories')->ignore($id, 'id')],
        ];
    }

    public function messages()
    {
        return [
            'category_name.required'=> 'Vui lòng nhập tên danh mục tin tức!',
            'category_name.min'=> 'Tên danh mục tin tức tối thiểu :min ký tự!',
            'category_name.max'=> 'Tên danh mục tin tức tối đa :max ký tự!',
            'category_name.unique'=> 'Tên danh mục tin tức này đã tồn tại!'
        ];
    }
}
