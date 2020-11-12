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
            'name_course'=> [
                'required'
            ],
            'number_course'=>[
                'required',
            ],
            'description'=>[
                'required',
            ]
        ];
    }
    public function messages()
    {
        return [
            'name_course.required'=>'Tên khóa học không được để trống',

            'number_course.required'=>'Số buổi học không được để trống',

            'description.required'=>'Mô tả không được để trống',
        ];
}
}