<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class DonBaoLuuRequest extends FormRequest
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
            'content' => 'required|min:10|max:300',
            'student_id' => 'unique:reserve',
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Lý do không được để trống!',
            'content.min' => 'Lý do phải nhiều hơn 10 ký tự',
            'content.max' => 'Lý do phải ít hơn 300 ký tự',
            'student_id.unique' => 'Đơn đã tồn tại',
        ];
    }
}
