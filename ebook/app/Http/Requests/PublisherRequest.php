<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublisherRequest extends FormRequest
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
            'txtName' => 'required|unique:publishers,name',
            'txtAddress' => 'required',
            'txtDescription' => 'required'
        ];
    }

    public function messages(){
        return [
            'txtName.required' => 'Vui lòng nhập tên nhà xuất bản',
            'txtAddress.required' => 'Vui lòng nhập địa chỉ',
            'txtDescription.required' => 'Vui lòng nhập mô tả',
            'txtName.unique' => 'Tên nhà xuất bản đã tồn tại'
        ];
    }
}
