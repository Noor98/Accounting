<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account_type extends Model
{
    protected $table="account_type";
    
    public function accounts()
    {
        return $this->hasMany('App\Account');
    }
}