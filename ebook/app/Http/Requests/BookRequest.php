<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'txtPrice'  => 'required',
            'txtQuantity'  => 'required',
            'txtDescription'  => 'required',
            'fImage' => 'required|image'
        ];
    }
    public function messages()
    {
        return [
            'txtName.required' => 'Tên sách không được để trống',
            'txtPrice.required' => 'Giá tiền không được để trống',
            'txtQuantity.required' => 'Số lượng không được để trống',
            'txtDescription.required' => 'Mô tả không được để trống',
            'fImage.required' => 'Hình ảnh không được để trống',
            'fImage.image' => 'Vui lòng chọn hình ảnh'
        ];
    }
}
