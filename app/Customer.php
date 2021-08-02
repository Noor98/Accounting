<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table="customer";
    
    public function customer_type()
    {
        return $this->belongsTo('App\Customer_type');
        //return $this->belongsTo('App\Country',"country_id","id");
        
    }
    public function account()
    {
        return $this->belongsTo('App\Account');
        //return $this->belongsTo('App\Country',"country_id","id");
    }
    
    public function operations()
    {
        return $this->hasMany('App\Operation');
    }
}