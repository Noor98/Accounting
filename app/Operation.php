<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $table="operation";
    
    public function details()
    {
        return $this->hasMany('App\OperationDetails');
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