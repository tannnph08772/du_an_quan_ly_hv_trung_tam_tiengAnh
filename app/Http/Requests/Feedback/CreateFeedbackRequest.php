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
        'answer'=>
            'required',
        'content'=>
            'required'
        ];
    }
    public function messages()
    {
        return [
            'answer.required'=>'Câu trả lời không được để trống',
            'content.required'=>'Ý kiến cá nhân không được để trống',
        ];
    }
}
