<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
            'from'          => 'required|date|after:yesterday',
            'to'            => 'required|date|after:from',
            'percent'       => 'required|numeric|min:0|max:100',
            'description'   => 'required|max:300|regex:/[A-Za-z\s]+/ ',
        ];
    }

    public function messages()
    {
        return [
            'from.required'     => 'Please enter the promotion start date',
            'to.required'       => 'Please enter the promotion end date',
            'percent.required'  => ' Please enter the promotion percentage',
           // 'percent.max' => trans(''),
        ];
    }
}
