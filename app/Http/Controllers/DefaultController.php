<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DefaultController extends AccountingBaseController
{
    public function index(){
        return view("default.index");
    }
}