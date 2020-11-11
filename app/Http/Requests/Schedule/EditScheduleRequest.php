<?php

namespace App\Http\Requests\Schedule;

use Illuminate\Foundation\Http\FormRequest;

class EditScheduleRequest extends FormRequest
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
            'name_schedule'=> [
                'required',
            ],
            'start_time'=>[
            'required',
            ],
            'end_time'=> [
            'required',
            'after:start_time'
            ]
        ];
    }
    public function messages()
    {
        return [
            'name_schedule.required'=>'Tên ca học không được để trống',

            'start_time.required'=>'Giờ bắt đầu không được để trống',

            'end_time.required'=>'Giờ kết thúc không được để trống',
            'end_time.after' => 'Giờ kết thúc phải sau giờ bắt đầu'

        ];
    }
}
