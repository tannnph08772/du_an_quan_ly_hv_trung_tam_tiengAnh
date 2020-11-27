<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class DonChuyenLopRequest extends FormRequest
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
            'student_id' => 'unique:sample_form',
            'class_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'content.required' => 'Nội dung không được để trống!',
            'content.min' => 'Nội dung phải nhiều hơn 10 ký tự',
            'content.max' => 'Nội dung phải ít hơn 300 ký tự',
            'student_id.unique' => 'Đơn đã tồn tại',
            'class_id.required' => 'Lớp chuyển tới không được để trống'
        ];
    }
}
