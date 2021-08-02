<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AccountingRequest;
use App\Account;//Model
use App\Customer;//Model
use App\Account_type;//Model
use App\Account_Route;//Model
use DB;

class AccountingController extends AccountingBaseController
{
    //
    public function index(Request $request)
    { 
        $q=$request["q"];
        $type_id=$request["type_id"];
        $route_id=$request["route_id"];
        $items = Account::whereRaw("true");//كل الامة
        if($q!="")
            $items=$items
                ->whereRaw("(number like ? or name like ?)",["%$q%","%$q%"]);
        if($type_id!="")
            $items=$items->whereRaw("account_type_id = ?",[$type_id]);
        if($route_id!="")
            $items=$items->whereRaw("account_route_id = ?",[$route_id]);
        
        $items=$items->orderby("number")->paginate(10)
            ->appends(["q"=>$q,"type_id"=>$type_id,"route_id"=>$route_id]);
        $account_types=Account_Type::all();
        $account_routes=Account_Route::all();
        return view("accounting.index", compact("items","q","type_id","route_id",
                "account_types","account_routes"));
    }
    
    public function create()
    { 
        $account_t=Account_type::get();
        $account_routes=Account_route::get();
        return view("accounting.create",compact("account_t","account_routes"));
    }
    public function store(AccountingRequest $request)
    {                
        $account_new = new Account();
        $account_new->name=$request["name"];
        $account_new->number=$request["number"];
        $account_new->account_type_id=$request["account_type_id"];
        $account_new->account_route_id=$request["account_route_id"];
        $account_new->balance=$request["balance"];
        $account_new->created_by=$this->user_id;
        $account_new->save();
        
        \Session::flash("msg","s:تمت عملية الاضافة بنجاح");
        return redirect("/account/create");//->withInput();
    }
    public function destroy($id)
    {
        $account_number = Account::find($id);
        if($account_number->operations->count()>0){            
            \Session::flash("msg","w:لا يمكن حذف الحساب لاحتوائه على عمليات");
            return redirect("/account");
        }
        $account_number->delete();
        $customer=Customer::where("account_id",$id)->first();
        if($customer!=null){
            $customer->delete();
        }
        \Session::flash("msg","s:تمت عملية الحذف بنجاح");
        return redirect("/account");
    }
    public function by_operation_type($id)
    {
        $accounts=Account::join("customer","account.id","customer.account_id")
        ->leftjoin("customer_type","customer_type.id","customer.customer_type_id")
        ->whereRaw("number>10000");
        if($id==2 || $id==4)
            $accounts = $accounts->whereRaw("customer_type.id=1");
        else if($id==1 || $id==3)
            $accounts = $accounts->whereRaw("customer_type.id=2");
        $accounts=$accounts->select("account.name as account",
         "customer_type.name as type","account.id as account_id")->get();
        return  response()
            ->json(['accounts' => $accounts]);
    }
}
