<?php

namespace App\Http\Requests\Place;

use Illuminate\Foundation\Http\FormRequest;
use phpDocumentor\Reflection\PseudoTypes\True_;

class CreatePlaceRequest extends FormRequest
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
                'unique:place,name_place'
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
            'name_place.unique'=>'Tên cơ sở đã tồn tại',

            'address.required'=>'Địa chỉ không được để trống'
        ];
    }
}