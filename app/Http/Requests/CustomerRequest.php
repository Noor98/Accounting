<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Customer;

class CustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route('customer');
        return [
        'name'   => 'required|max:50|unique:customer,name,' . $id . ',id',
        'mobile' => 'required|max:50|unique:customer,mobile,' . $id . ',id',
        'phone' => 'required|max:50|unique:customer,phone,' . $id . ',id',
        'address' => 'required|max:50:customer,address,' . $id . ',id',
        'customer_type_id' => 'required|max:50:customer,customer_type_id,' . $id . ',id',
        'email' => 'required|max:50|unique:customer,email,' . $id . ',id'            
        ];
    }
}
