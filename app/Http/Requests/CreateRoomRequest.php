<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateRoomRequest extends FormRequest
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
            'room_name'=>'required|min:10',
            'history'=>'required',
            'mission'=>'required',
            'achievement'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'room_name.required'=>'Tên phòng ban không được trống!',
            'room_name.min'=>'Tên phòng tối thiểu 10 ký tự!',
            'history.required'=>'Lịch sử phòng ban không được trống!',
            'mission.required'=>'Nhiệm vụ phòng ban không được trống!',
            'achievement.required'=>'Thành tựu phòng ban không được trống!'
        ];
    }
}
