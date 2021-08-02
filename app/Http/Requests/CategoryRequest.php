<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Category;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route('category');
        return [            
            //'name'=>'required|max:50|unique:category'
            'name'=>'required|max:50|unique:category,name,'.$id.',id',
        ];
    }
}
