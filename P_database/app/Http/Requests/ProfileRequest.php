<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileRequest extends FormRequest
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
            'name'=>'required|min:3',
            'family'=>'required',
            'sex'=>'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore(auth()->user()->id, 'id')
            ],
            'phone' => ['required', 'size:11', 'regex:/^[0]{1}[9]{1}\d{9}$/',
                Rule::unique('users')->ignore(auth()->user()->id, 'id')],
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
