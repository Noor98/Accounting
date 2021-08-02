<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_type extends Model
{    
    protected $table="customer_type";
    
    public function customers()
    {
        //forign key country_id
        //primary key id
        return $this->hasMany('App\Customer');
        //return $this->hasMany('App\Account',"country_id","id");
    }
}
