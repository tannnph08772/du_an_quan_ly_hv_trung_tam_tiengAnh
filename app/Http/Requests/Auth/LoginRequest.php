<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
                'email' => 'required|email|exists:users,email',
                'password' => [
                   'required',
                   'min:6',
            ],
        ];
    }

    public function messages()
    {
        return [
                'email.required' => 'Email không được để trống!',
                'email.email' => 'Email sai định dạng!',
                'email.exists' => 'Email không tồn tại trong hệ thống!',
                'password.required' => 'Password không được để trống!',
                'password.min' => 'Password phải chứa ít nhất 6 kí tự!', 
        ];
    }
}