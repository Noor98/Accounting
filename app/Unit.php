<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{    
    protected $table="unit";
    
    public function items()
    {
        return $this->hasMany('App\Item');
    }
}
