<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DkkhMoiRequest extends FormRequest
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
            'email' => 'unique:wait_list,email',
        ];
    }
    public function messages()
    {
        return [
            'email.unique' => 'Tài khoản của bạn đang đăng ký khóa học mới!',
        ];
    }

}
