<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table="item";
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
    public function unit()
    {
        return $this->belongsTo('App\Unit');        
    }
}