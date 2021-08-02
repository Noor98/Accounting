<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationDetails extends Model
{
    protected $table="operation_details";
    
    public function operation()
    {
        return $this->belongsTo('App\Operation');
    }
    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}