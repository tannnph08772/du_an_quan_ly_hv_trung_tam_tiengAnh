<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassRequest extends FormRequest
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
            'name_class' => 'required|unique:classes,name_class|min:3',
            'start_day' => 'required|date|after:today',
            'weekday' => 'required|min:2',
        ];
    }

    public function messages(){
        return [
            'required' => 'Không được để trống',
            'name_class.unique' => 'Lớp đã tồn tại',
            'name_class.min' => 'Tên lớp phải lơn hơn 3 ký tự',
            'start_day.after' => 'Ngày bắt đầu phải sau ngày hiện tại', 
            'weekday.min' => 'Một tuần phải có 2 buổi học'
        ];
    }
}
