<?php

namespace App\Http\Requests\Course;

use Illuminate\Foundation\Http\FormRequest;

class CreateCourseRequest extends FormRequest
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
            'required',
            'max:100',
            'min:5',
            'unique:course,name_cource',
        ],
        'number_cource'=>[
        'required',
        ],
        'discription'=> [
        'required',
        ]
        ];
    }
    public function messages()
    {
        return [
            'name_cource.required'=>'Tên khóa học không được để trống',
            'name_cource.max'=>'Tên khóa học phải dưới 100 kí tự',
            'name_cource.min'=>'Tên khóa học phải trên 5 kí tự',
            'name_cource.unique'=>'Tên khóa học đã tồn tại',

            'number_cource.required'=>'Số buổi học không được để trống',

            'discription.required'=>'Mô tả không được để trống',


        ];
    }
}
