<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TuitionRequest extends FormRequest
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
            'sum_money' => 'required|regex:/^[0-9]*$/',
            'image' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Không được để trống!',
            'sum_money.regex' => 'Số tiền phải là định dạng số và lớn hơn 0'
        ];
    }

}
