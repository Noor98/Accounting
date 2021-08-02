<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Category;

class VoucherRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [            
            'description'=>'required',
            'voucher_date'=>'required',
            'account_arr'=>'array|required',
            'amount_arr'=>'array|required',
            'type_arr'=>'array|required',
        ];
    }
}
