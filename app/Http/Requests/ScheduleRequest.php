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
            'fullname'=> "required|max:50|alpha",
            'fullname'=> ["regex:/^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s\W|_]+$/"],
            'phone'=>["required","min:10","max:11", "regex:/^(84|0[2|3|5|7|8|9])+([0-9]{8,9})$\b/"],
            'date'=>'required|after_or_equal:today',
            'service_id'=>'required'
        ];
    }
    public function messages()
    {
        return [
            'fullname.required'=> "Vui lòng nhập họ và tên!",
            'fullname.max'=> "Họ và tên tối đa 50 ký tự!",
            'fullname.alpha'=> "Họ và tên phải là ký tự chữ!",
            'fullname.regex'=> "Định dạng họ và tên không hợp lệ!",
            'phone.required'=>"Vui lòng nhập số điện thoại!",
            'phone.numeric'=>"Số điện thoại phải là ký tự số!",
            'phone.min'=>"Số điện thoại tối thiểu 10 ký tự số!",
            'phone.max'=>"Số điện thoại tối đa 11 ký tự số!",
            'phone.regex'=>"Số điện thoại không đúng định dạng!",
            'date.required'=>'Vui lòng chọn ngày đặt lịch!',
            'date.after_or_equal'=>'Ngày đặt lịch phải là ngày sau hoặc bằng ngày hôm nay!',
            'service_id.required'=>'Vui lòng chọn dịch vụ!'
        ];
    }

    // protected function prepareForValidation()
    //  {
    //      $this->merge([
    //          'service_id'=>implode(',',$this->service_id)
    //      ]);
    //  }
}
///
