<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Admin;

class adminRequest extends FormRequest
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
        $id = $this->route('admin');
        return [
            'name' => 'required|max:50',
            'email' => 'required|max:50|unique:admin,email,' . $id . ',id',
            'phone' => 'required',
            'active' => 'required'
        ];
    }
}
