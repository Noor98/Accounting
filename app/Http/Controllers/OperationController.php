<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\OperationRequest;
use App\Account;//Model
use App\Customer;//Model
use App\Account_type;//Model
use App\Operation_type;//Model
use App\OperationDetails;//Model
use App\Operation;//Model
use App\Item;//Model
use DB;

class OperationController extends AccountingBaseController
{
    public function index(Request $request){
          
        $q=$request["q"];
        $account_id=$request["account_id"];
        $type_id=$request["type_id"];
        $from=$request["from"];
        $to=$request["to"];
            
        $items=Operation::join("account","account_id","account.id")
            ->whereRaw("true");//كل الامة
        if($q!="")
            $items=$items->whereRaw(("(account.name like ?)"),["%$q%"]);
        if($type_id!="")
            $items=$items->whereRaw("operation_type_id = ?",[$type_id]);
        if($account_id!="")
            $items=$items->whereRaw("account_id = ?",[$account_id]);
        if($from!="")
            $items=$items->whereRaw("operation_date >= ?",[$from]);
        if($to!="")
            $items=$items->whereRaw("operation_date <= ?",[$to]);
        
        $items=$items->orderby("operation.id","desc")
            ->select("operation.*")
            ->paginate(10)
            ->appends(["q"=>$q,"account_id"=>$account_id,"type_id"=>$type_id
            ,"from"=>$from,"to"=>$to]);
        return view("operation.index",compact("items","q","type_id","from",
                    "to","account_id"));
    
    }
    public function show($id)
    {         
        $operation=Operation::find($id);
        return view("operation.show",compact("operation"));    
    }
    public function create()
    {         
        $operation_types=Operation_type::get();
        $items=Item::get();
        return view("operation.create",compact("operation_types","items"));    
    }
    public function store(OperationRequest $request)
    {  
        $operation = new Operation();
        $operation->account_id=$request['account_id'];
        $operation->operation_type_id=$request['operation_type_id'];
        $operation->operation_date=$request['operation_date'];
        $operation->discount=$request['discount'];
        $operation->description=$request['description'];
        $operation->created_by=$this->user_id;
        $operation->save();
        
        $total=0;
        for($i=0;$i<sizeof($request["item_id_arr"]);$i++){
            $id=$request["item_id_arr"][$i];
            $qty=$request["qty_arr"][$i];
            $discount=$request["discount_arr"][$i];
            
            $item=Item::find($id);
            $price=0;
            $ot=$request['operation_type_id'];
            if($ot==1 || $ot==3)
                $price=$item->buy_price;
            else if($ot==2 || $ot==4)
                $price=$item->sell_price;
            
            $details=new OperationDetails();
            $details->operation_id=$operation->id;
            $details->item_id=$item->id;
            $details->unit_id=$item->unit_id;
            $details->unit_price=$price;
            $details->discount=$discount;
            $details->quantity=$qty;
            $details->price=$qty*$price;
            $details->amount=$details->price-$discount;
            $total+=$details->amount;
            $details->save();
        }
        $operation->price=$total;
        $operation->amount=$total-$operation->discount;
        $operation->save();
        \Session::flash("msg","s:تمت عملية الاضافة بنجاح");
        return redirect("/operation/create");
    }
}