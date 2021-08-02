<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation_type extends Model
{    
    protected $table="operation_type";
    
    public function operations()
    {
        return $this->hasMany('App\Operation');
    }
}
