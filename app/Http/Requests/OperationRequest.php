<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Category;

class OperationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [            
            'account_id'=>'required',
            'operation_type_id'=>'required',
            'operation_date'=>'required',
            'item_id_arr'=>'array|required',
            'qty_arr'=>'array|required',
            'discount_arr'=>'array|required',
        ];
    }
}
