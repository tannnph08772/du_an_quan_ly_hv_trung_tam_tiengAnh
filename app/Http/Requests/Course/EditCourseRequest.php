<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class EditCourseRequest extends FormRequest
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
            'name_cource'=> [
                'required'
            ],
            'number_cource'=>[
                'required',
            ],
            'discription'=>[
                'required',
            ]
        ];
    }
    public function messages()
    {
        return [
            'name_cource.required'=>'Tên khóa học không được để trống',

            'number_cource.required'=>'Số buổi học không được để trống',

            'discription.required'=>'Mô tả không được để trống',
        ];
}
}