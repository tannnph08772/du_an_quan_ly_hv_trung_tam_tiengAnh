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
            'date' => 'required|date_format:Y-m-d',
            'schedule_id' => 'required',
            'teacher_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Không được để trống!',
            'date.date_format' => 'Sai định dạng ngày tháng!',
        ];
    }
}
