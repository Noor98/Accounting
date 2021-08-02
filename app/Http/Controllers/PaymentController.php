<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;
use App\Account;//Model
use App\Customer;//Model
use App\Account_type;//Model
use App\Operation_type;//Model
use App\OperationDetails;//Model
use App\Operation;//Model
use App\Item;//Model
use App\Payment;//Model
use App\Payment_Value_Type;//Model
use DB;

class PaymentController extends AccountingBaseController
{
    public function index(Request $request){          
        $q=$request["q"];
        $account_id=$request["account_id"];
        $type_id=$request["type_id"];
        $from=$request["from"];
        $to=$request["to"];
            
        $value_types=Payment_Value_Type::get();
        $items=Payment::join("account","account_id","account.id")
            ->whereRaw("true");//كل الامة
        if($q!="")
            $items=$items->whereRaw(("(account.name like ?)"),["%$q%"]);
        if($type_id!="")
            $items=$items->whereRaw("value_type_id = ?",[$type_id]);
        if($account_id!="")
            $items=$items->whereRaw("account_id = ?",[$account_id]);
        if($from!="")
            $items=$items->whereRaw("created_at >= ?",[$from]);
        if($to!="")
            $items=$items->whereRaw("created_at <= ?",[$to]);
        
        $items=$items->orderby("payment.id","desc")
            ->select("payment.*")
            ->paginate(10)
            ->appends(["q"=>$q,"account_id"=>$account_id,"type_id"=>$type_id
            ,"from"=>$from,"to"=>$to]);
        return view("payment.index",compact("items","q","type_id","from",
                    "to","account_id","value_types"));
    
    }
    public function create()
    {         
        $value_types=Payment_Value_Type::get();
        $accounts=Account::where("number",">","10000")->get();
        return view("payment.create",compact("value_types","accounts"));    
    }
    public function store(PaymentRequest $request)
    {  
        $payment=new Payment();
        $payment->account_id=$request["account_id"];
        $payment->value_type_id=$request["value_type_id"];
        $payment->value=$request["value"];
        $payment->serial=$request["serial"];
        $payment->comment=$request["comment"];
        $payment->created_by=$this->user_id;
        $payment->save();
        \Session::flash("msg","s:تمت عملية الاضافة بنجاح");
        return redirect("/payment/create");
    }
}