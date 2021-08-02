<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use View;
class AccountingBaseController extends Controller
{
    protected $user_id=1;
    protected $user_name="باسل محمد";
    function __construct() {	
        View::share("user_id",$this->user_id);
        View::share("user_name",$this->user_name);
        $this->middleware('auth');
        $this->middleware('CheckPermission');
    }
}