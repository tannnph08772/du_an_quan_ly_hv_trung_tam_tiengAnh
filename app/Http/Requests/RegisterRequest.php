<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'birthday' => 'required|date|before:2004-12-31',
            'phone_number' => 'required|numeric|digits:10',
            'email' => 'required|email|unique:wait_list,email',
            'address' => 'required',
            'sex' => 'required',
            'course_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Không được để trống!',
            'birthday.date' => 'Phải đúng định dạng ngày tháng!',
            'birthday.before' => 'Bạn chưa đủ 16 tuổi!',
            'phone_number.numeric' => 'Số điện thoại phải dạng số!',
            'phone_number.digits' => 'Số điện thoại có 10 kí tự!',
            'email.email' => 'Phải nhập đúng định dạng email!',
            'email.unique' => 'Tài khoản đã tồn tại!',
        ];
    }

}
