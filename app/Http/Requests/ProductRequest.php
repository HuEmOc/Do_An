<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'      =>    'required|max:255|regex:/[A-Za-z\s]+/ ',
            'alias'     =>    'required|max:100',
            'price'     =>    'required|min:0|numeric',
            'quantity'  =>    'required|numeric|min:0',
            'image'     =>    'required|image|max:10240',
            'sale_id'   =>    'required|numeric|min:0'

        ];
    }
}
