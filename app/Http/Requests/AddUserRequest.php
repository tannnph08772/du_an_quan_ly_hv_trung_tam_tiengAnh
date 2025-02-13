<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
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
            'birthday.before' => 'Ngày sinh phải nhỏ hơn ngày hiện tại!',
            'phone_number.numeric' => 'Số điện thoại phải dạng số!',
            'phone_number.digits' => 'Số điện thoại có 10 kí tự!',
            'email.email' => 'Phải nhập đúng định dạng email!',
            'email.unique' => 'Tài khoản đã tồn tại trong hệ thống!',
            'address.min' => 'Địa chỉ phải có ít nhất 4 ký tự'
        ];
    }

}
