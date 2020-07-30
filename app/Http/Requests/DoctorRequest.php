<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'name'=>'required',
            'family'=>'required',
            'degree'=>'required',
            'field'=>'required',
            'marriage'=>'required',
            'sex'=>'required',
            'section_id'=>'required',
            'number_of_child'=>'required',
            'phone'=>'required|unique:users|regex:/^[0]{1}[9]{1}\d{9}$/',
            'password'=>'required|min:6'
        ];
    }
}
