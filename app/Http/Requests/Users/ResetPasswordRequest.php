<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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
            'curr_password' => 'required',
            'new_password' => 'required|min:4',
            'new_confirm_password' => 'required|same:new_password|min:4',
        ];
    }
    public function messages()
    {
        return [
            'curr_password.required' => 'Nhập mật khẩu cũ',
            'new_password.required' => 'Nhập mật khẩu mới',
            'new_password.min' => 'Mật khẩu mới phải trên hoặc bằng 4 ký tự',
            'new_confirm_password.required' => 'Nhập lại mật khẩu mới',
            'new_confirm_password.same' => 'Mật khẩu mới nhập lại sai'

        ];
    }
}