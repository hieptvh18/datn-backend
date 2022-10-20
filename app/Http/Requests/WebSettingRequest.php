<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebSettingRequest extends FormRequest
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
            'logo'=>['image', 'mimes:png,jpg,jpeg'],
            'web_name'=>['required', 'max:70'],
            'phones'=>["required","min:10","max:11", "regex:/^(84|0[2|3|5|7|8|9])+([0-9]{8,9})$\b/"],
            'address'=>['required'],
            'open_time'=>['required'],
            'close_time'=>['required'],
            'start_date'=>['required'],
            'end_date'=>['required'],
            'introduce'=>['required'],
        ];
    }

    public function messages()
    {
        return [
            'logo.image'=>'Không phải file ảnh!',
            'logo.mimes'=>'Ảnh phải thuộc loại: png, jpg, jpeg! ',
            'web_name.required'=>'Vui lòng nhập tên website',
            'web_name.max'=>'Tên website tối đa :max ký tự!',
            'phones.required'=>"Vui lòng nhập số điện thoại!",
            'phones.numeric'=>"Số điện thoại phải là ký tự số!",
            'phones.min'=>"Số điện thoại tối thiểu 10 ký tự số!",
            'phones.max'=>"Số điện thoại tối đa 11 ký tự số!",
            'phones.regex'=>"Số điện thoại không đúng định dạng!",
            'address'=>"Vui lòng nhập địa chỉ phòng khám!",
            'open_time'=>"Vui lòng nhập giờ mở cửa phòng khám!",
            'close_time'=>"Vui lòng nhập giờ đóng cửa phòng khám!",
            'start_date'=>"Vui lòng chọn ngày bắt đầu làm việc trong tuần!",
            'end_date'=>"Vui lòng chọn ngày kết thúc làm việc trong tuần!",
            'introduce'=>"Vui lòng nhập giới thiệu!",
        ];
    }
}
