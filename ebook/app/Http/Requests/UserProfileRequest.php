<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'birthday' => 'required',
            'fileImg' => 'image',
            'phone' => 'required'
        ];
    }
    public function message(){
        return [
            'name.required' => 'không được để trống',
            'address.required' => 'không được để trống',
            'birthday.required' => 'không được để trống',
            'phone.required' => 'không được để trống'
        ];
    }
}
