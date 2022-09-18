<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            'fullname'=> "required|max:50",
            'phone'=>["required","min:10","max:11","unique:schedules", "regex:/^(84|0[2|3|5|7|8|9])+([0-9]{8,9})$\b/"],
            'gender'=>'required',
            'content'=>'required',
            'date'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'fullname.required'=> "Vui lòng nhập họ và tên!",
            'fullname.max'=> "Họ và tên tối đa 50 ký tự!",
            'fullname.string'=> "Họ và tên phải là ký tự chữ!",
            'phone.required'=>"Vui lòng nhập số điện thoại!",
            'phone.numeric'=>"Số điện thoại phải là ký tự số!",
            'phone.min'=>"Số điện thoại tối thiểu 10 ký tự số!",
            'phone.max'=>"Số điện thoại tối đa 11 ký tự số!",
            'phone.unique'=>"Số điện thoại đã tồn tại!",
            'phone.regex'=>"Số điện thoại không đúng định dạng!",
            'gender.required'=>'Vui lòng chọn giới tính!',
            'content.required'=>'Vui lòng nhập nội dung!',
            'date.required'=>'Vui lòng chọn ngày đặt lịch!'
        ];
    }
}
