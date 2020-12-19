<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCalendarRequest extends FormRequest
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
            'date' => 'required|date|after_or_equal:date',
            'schedule_id' => 'required',
            'teacher_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Không được để trống!',
            'date.date' => 'Sai định dạng ngày tháng!',
            'date.after_or_equal' => 'Ngày phải sau hoặc bằng ngày đã cho!'
        ];
    }
}
