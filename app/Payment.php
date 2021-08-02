<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table="payment";
    public function payment_value_type()
    {
        return $this->belongsTo('App\Payment_Value_Type',"value_type_id","id");
    }
    public function account()
    {
        return $this->belongsTo('App\Account');
    }
}