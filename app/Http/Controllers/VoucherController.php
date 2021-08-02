<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VoucherRequest;
use App\Customer;//Model
use App\Account;//Model
use App\Account_Transaction;//Model
use App\Account_Transaction_Type;//Model
use App\Voucher;//Model
use App\Operation;//Model
use App\Item;//Model
use DB;

class VoucherController extends AccountingBaseController
{
    public function index(Request $request){
          
        $q=$request["q"];
        $from=$request["from"];
        $to=$request["to"];
            
        $items=Voucher::whereRaw("true");//كل الامة
        if($q!="")
            $items=$items->whereRaw(("(description like ?)"),["%$q%"]);
        if($from!="")
            $items=$items->whereRaw("voucher_date >= ?",[$from]);
        if($to!="")
            $items=$items->whereRaw("voucher_date <= ?",[$to]);
        
        $items=$items->orderby("voucher.id","desc")
            ->select("voucher.*")
            ->paginate(10)
            ->appends(["q"=>$q,"from"=>$from,"to"=>$to]);
        return view("voucher.index",compact("items","q","from","to"));
    
    }
    public function show($id)
    {         
        $voucher=Voucher::find($id);
        return view("voucher.show",compact("voucher"));    
    }
    public function create()
    {         
        $transaction_types=Account_Transaction_Type::get();
        $items=Account::get();
        return view("voucher.create",compact("transaction_types","items"));    
    }
    public function store(VoucherRequest $request)
    {  
        /*echo $request["voucher_date"]."<br>";
        echo $request["description"]."<br>";
        print_r($request["account_arr"]);
        echo "<br>";
        print_r($request["desc_arr"]);
        echo "<br>";
        print_r($request["type_arr"]);
        echo "<br>";
        print_r($request["amount_arr"]);
        echo "<br>";
        die();*/        
        
        $totalDept=0;
        $totalCredt=0;
        for($i=0;$i<sizeof($request["account_arr"]);$i++){
            $type=$request["type_arr"][$i];
            $amount=$request["amount_arr"][$i];   
            if($type==1)
                $totalDept+=$amount;
            else
                $totalCredt+=$amount;
        }
        if($totalDept!=$totalCredt){
             return  response()
            ->json(['status' => 0,"msg"=>"القيد غير متوازن"]);
        }
        $v = new Voucher();
        $v->value = $totalCredt;
        $v->description=$request['description'];
        $v->voucher_date=$request['voucher_date'];
        $v->created_by=$this->user_id;
        $v->save();
        
        
        
        $total=0;
        for($i=0;$i<sizeof($request["account_arr"]);$i++){
            $description=$request["desc_arr"][$i];
            $account_id=$request["account_arr"][$i];
            $type=$request["type_arr"][$i];
            $amount=$request["amount_arr"][$i];            
            $details=new Account_Transaction();
            $details->voucher_id=$v->id;
            $details->account_id=$account_id;
            $details->account_transaction_type_id=$type;
            $details->amount=$amount;
            $details->description=$description;
            $details->save();
        }
         return  response()
            ->json(['status' => 1,"msg"=>"تمت عملية الاضافة بنجاح"]);
    }
}