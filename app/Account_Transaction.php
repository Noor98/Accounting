<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account_Transaction extends Model
{    
    protected $table="account_transaction";
    
    public function voucher()
    {
        return $this->belongsTo('App\Voucher');
    }
    public function account()
    {
        return $this->belongsTo('App\Account');
    }
    public function type()
    {
        return $this->belongsTo('App\Account_Transaction_Type');
    }
}
