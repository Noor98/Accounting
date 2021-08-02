<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $table="voucher";
    
    public function details()
    {
        return $this->hasMany('App\Account_Transaction');
    }
    public function operation_type()
    {
        return $this->belongsTo('App\Operation_Type');
    }
    public function account()
    {
        return $this->belongsTo('App\Account');
    }
}