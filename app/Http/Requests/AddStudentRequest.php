<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddStudentRequest extends FormRequest
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
            'name' => 'required|min:4',
            'birthday' => 'required|date|before:now',
            'phone_number' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'address' => 'required|min:4',
            'sex' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Không được để trống!',
            'name.min' => 'Họ và tên phải có ít nhất 4 ký tự',
            'birthday.date' => 'Phải đúng định dạng ngày tháng!',
            'birthday.before' => 'Tuổi phải nhỏ hơn tuổi hiện tại!',
            'phone_number.numeric' => 'Số điện thoại phải dạng số!',
            'phone_number.digits' => 'Số điện thoại có 10 kí tự!',
            'email.email' => 'Phải nhập đúng định dạng email!',
            'address.min' => 'Địa chỉ phải có ít nhất 4 ký tự'
        ];
    }

}
