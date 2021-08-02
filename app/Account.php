<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{    
    protected $table="account";
    
    public function customers()
    {
        //forign key country_id
        //primary key id
        return $this->hasMany('App\Customer');
        //return $this->hasMany('App\Account',"country_id","id");
    }
    public function operations()
    {
        return $this->hasMany('App\Operation');
    }
    public function account_type()
    {
        return $this->belongsTo('App\Account_type');        
    }
    public function account_route()
    {
        return $this->belongsTo('App\Account_Route');        
    }
}
