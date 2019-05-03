<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KindRequest extends FormRequest
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
            'txtName' => 'required|unique:kinds,name'
        ];
    }
    public function messages(){
        return [
            'txtName.required' =>'Vui lòng nhập thể loại sách',
            'txtName.unique' => 'Tên thể loại đã tồn tại'
        ];
    }
}
