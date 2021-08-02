<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Accounting;
use App\Account_type;

class AccountingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required|max:50',
            'number' => 'required|max:50',
            'account_type_id' => 'required',
            'account_route_id' => 'required',
            'balance' => 'required'
        ];
    }
}