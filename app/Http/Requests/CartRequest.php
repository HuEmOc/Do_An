<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            'txtEmail' => 'required|email',
            'txtName' => 'required',
            'txtPhone' => 'required',
            'txtAddress' => 'required'
        ];
    }

        public function messages(){
        return [
            'txtEmail.required'   => 'Vui lòng nhập Email',
            'txtEmail.email'      => 'Email không đúng định dạng',
            'txtName.required'    => 'Vui lòng nhập tên của bạn',
            'txtPhone.required'   => 'Vui lòng nhập số điện thoại của bạn',
            'txtAddress.required' => 'Vui lòng nhập địa chỉ của bạn'
        ];
    }

}
