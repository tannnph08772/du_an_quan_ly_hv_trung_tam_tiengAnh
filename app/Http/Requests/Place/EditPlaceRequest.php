<?php

namespace App\Http\Requests\Place;

use Illuminate\Foundation\Http\FormRequest;

class EditPlaceRequest extends FormRequest
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
            'name_place'=> [
                'required',
            ],
            'address'=>[
            'required',
            ]
        ];
    }
    public function messages()
    {
        return [
            'name_place.required'=>'Tên cơ sở không được để trống',

            'address.required'=>'Địa chỉ không được để trống'
        ];
    }
}