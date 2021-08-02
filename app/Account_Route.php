<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account_Route extends Model
{
    protected $table="account_route";
    
    public function accounts()
    {
        return $this->hasMany('App\Account');
    }
}