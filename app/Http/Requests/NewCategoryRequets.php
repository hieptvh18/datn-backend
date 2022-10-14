<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewCategoryRequets extends FormRequest
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
            'category_name'=>['required', 'unique:news_categories', 'min:5', 'max:50']
        ];
    }

    public function messages()
    {
        return [
            'category_name.required'=> 'Vui lòng nhập tên danh mục tin tức!',
            'category_name.unique'=> 'Tên danh mục tin tức này đã tồn tại!',
            'category_name.min'=> 'Tên danh mục tin tức tối thiểu :min ký tự!',
            'category_name.max'=> 'Tên danh mục tin tức tối đa :max ký tự!'
        ];
    }
}
