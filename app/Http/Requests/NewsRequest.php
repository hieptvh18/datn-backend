<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title'=>['required', 'min:5', 'max:255'],
            'content'=>['required'],
            'image.*' => 'image|mimes:jpg,png,jpeg'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=> 'Vui lòng nhập tiêu đề bài viết!',
            'title.min'=> 'Tiêu đề bài viết tối thiểu :min ký tự!',
            'title.max'=> 'Tiêu đề bài viết tối đa :max ký tự!',
            'content.required'=>'Vui lòng nhập nội dung bài viết!',
            'image.*.image' => 'Vui lòng chọn file ảnh!',
            'image.*.mimes' => 'Ảnh phải là dạng jpg, png, jpeg!'
        ];
    }
}
