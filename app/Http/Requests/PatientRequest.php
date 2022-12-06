<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientRequest extends FormRequest
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
            'customer_name'=>'required|min:3|max:50',
            'phone'=>['required','regex:/(((\+|)84)|0)(3|5|7|8|9)+([0-9]{8})\b/'],
            'birthday'=>'required',
            'status'=>'required',
            'description'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'phone.required'=>':attribute không được để trống',
            'phone.regex'=>':attribute không hợp lệ',
            'phone.birthday'=>':attribute không được để trống',
            'cmnd.requried'=>':attribute không được để trống',
            'cmnd.min'=>':attribute phải lớn hơn :min kí tự',
            'cmnd.max'=>':attribute không được lớn hơn :max kí tự',
            'customer_name.required'=>':attribute không được để trống',
            'customer_name.max'=>':attribute không được lớn hơn :max kí tự',
            'customer_name.min'=>':attribute phải lớn hơn :min kí tự',
            'status.required'=>':attribute không được để trống',
            'birthday.required'=>':attribute không được để trống',
            'description.required'=>':attribute không được để trống',
        ];
    }

    public function attributes()
    {
        return [
            'phone'=>'Điện thoại',
            'customer_name'=>'Tên bệnh nhân',
            'status'=>'Trạng thái',
            'birthday'=>'Năm sinh',
            'description'=>'Mô tả',
        ];
    }
}
