<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Item;

class ItemRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'unit_id'=> 'required',
            'category_id'=> 'required',
            'name' => 'required|max:50|unique:category',
            'sell_price'=> 'required',
            'buy_price'=> 'required'
          
        ];
        /*$category = Category::find($this->category);

        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'category.name' => 'required|max:50|unique:category'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [                    
                    'category.name' => 'required|max:50|unique:category'.$category->id
                ];
            }
            default:break;
        }*/
    }
}
