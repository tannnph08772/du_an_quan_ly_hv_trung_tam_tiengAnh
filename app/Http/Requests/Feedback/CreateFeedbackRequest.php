<?php

namespace App\Http\Requests\Feedback;

use Illuminate\Foundation\Http\FormRequest;

class CreateFeedbackRequest extends FormRequest
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
        'name_student'=>
            'required',
        'email'=>
            'required',
        'phone'=>
            'required',
        'course_id' =>
            'required',
        'class_id'=>
            'required',
        'answer'=>
            'required',
        'content'=>
            'required'
        ];
    }
    public function messages()
    {
        return [
            'name_student.required'=>'tên không được để trống',
            'email.required'=>'email không được để trống',
            'phone.required'=>'số điện thoại không được để trống',
            'course_id.required'=>'khóa học không được để trống',
            'class_id.required'=>'lớp không được để trống',
            'answer.required'=>'câu trả lời không được để trống',
            'content.required'=>'ý kiến cá nhân không được để trống',
            
        ];
    }
}
