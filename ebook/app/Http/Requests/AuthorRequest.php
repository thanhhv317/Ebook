<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
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
            'txtName' => 'required',
            'txtBirthday' => 'required',
            'txtDescription' =>'required',
            'fImage' => 'required|image'
        ];
    }

    public function messages(){
        return [
            'txtName.required' => 'Vui lòng nhập Tên tác giả',
            'txtBirthday.required' => 'Vui lòng nhập ngày sinh',
            'txtDescription.required' => 'Vui lòng nhập thông tin mô tả',
            'fImage.required' => 'Vui lòng chọn hình ảnh',
            'fImage.image' => 'Hình ảnh vừa chọn không phù hợp'
        ];
    }
}
