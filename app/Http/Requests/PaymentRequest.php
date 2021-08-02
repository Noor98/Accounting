<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [            
            'account_id'=>'required',
            'value_type_id'=>'required',
            'value'=>'required'
        ];
    }
}
