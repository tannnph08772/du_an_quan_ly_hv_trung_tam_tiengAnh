<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeworkRequest extends FormRequest
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
            'title' => 'required|min:3',
            'end_day' => 'required|after_or_equal:today',
        ];
    }

    public function messages(){
        return [
            'required' => 'Không được để trống',
            'title.min' => 'Tên lớp phải lơn hơn 3 ký tự',
            'end_day.after_or_equal' => 'Ngày hết hạn phải lớn hơn hoặc bằng ngày hiện tại'
        ];
    }
}
