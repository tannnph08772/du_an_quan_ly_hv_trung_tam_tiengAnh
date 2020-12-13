<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class CreateContactRequest extends FormRequest
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
            'name_student' =>
            'required|regex:/^[\D]+$/i|max:50',

            'phone' =>
            'required',

            'email' =>
            'required',

            'address' =>
            'required',

            'work' =>
            'required',

            'content' =>
            'required',
        ];
    }
public function messages()
{
    return [
        'name_student.required'=>'Vui lòng điền tên',
        'name_student.regex'=>'Tên không được nhập số',
        'name_student.max'=>'Tên không được quá 50 kí tự',
        'phone.required'=>'Số điện thoại không được để trống',
        'email.required'=>'Email không được để trống',
        'address.required'=>'Địa chỉ không được để trống',
        'work.required'=>'Công việc không được để trống',
        'content.required'=>'Lời nhắn không được để trống',
    ];
}
}
