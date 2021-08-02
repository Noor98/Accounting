<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CustomerRequest;
use App\Customer;
use App\Customer_type;
use App\Account;
use DB;

class CustomerController extends AccountingBaseController
{
    public function index(Request $request)
    { 
        
        $q=$request["q"];
        $mobile=$request["mobile"];
        $address=$request["address"];
        $customer_type_id=$request["customer_type_id"];
        $customers = Customer::whereRaw("true");//كل الامة
        if($q!="")
            $customers=$customers
                ->whereRaw("(name like ? or email like ?)",["%$q%","%$q%"]);
        if($mobile!="")
            $customers=$customers->whereRaw("(mobile = ? or phone = ?)",[$mobile,$mobile]);
            
        if($address!="")
            $customers=$customers->whereRaw("address like ?",["%$address%"]);
        if($customer_type_id!="")
            $customers=$customers->whereRaw("customer_type_id = ?",[$customer_type_id]);
        
        $customers=$customers->paginate(4)
            ->appends(["q"=>$q,"mobile"=>$mobile,"address"=>$address]);
        
        $customer_typeList=Customer_type::all();
        return view("customer.index",
            compact("customers","q","mobile","address","customer_typeList","customer_type_id"));
        
          
    }
    public function create()
    { 
        $customer_types=Customer_type::get();
        return view("customer.create",compact("customer_types"));
    }
    
    public function store(CustomerRequest $request)
    {     
        //اضافة  زبون
        $customer = new Customer();
        $customer->name=$request["name"];
        $customer->mobile=$request["mobile"];
        $customer->phone=$request["phone"];
        $customer->address=$request["address"];
        $customer->email=$request["email"];
        $customer->customer_type_id=$request["customer_type_id"];
        $customer->created_by=$this->user_id;
        $customer->save();        
        
        //اضافة حساب بشكل تلقائي للزبون
        $account=new Account();
        $account->name=$request["name"];
        $account->number=$customer->customer_type_id*100000+$customer->id;
        $account->created_by=$this->user_id;
        $account->balance=0;$account->parent_number=0;
        $account->account_type_id=$customer->customer_type_id;
        $account->account_route_id=4;
        $account->save();
        
        //ربط الزبون بالحساب
        $customer->account_id=$account->id;
        $customer->save();
        
        \Session::flash("msg","s:تمت عملية الاضافة بنجاح");
        return redirect("/customer/create");//->withInput();
    }
    
    public function edit($id)
    {        
        $customer_types=Customer_type::get();
        $customers=Customer::find($id);
        if($customers==NULL){            
            \Session::flash("msg","e:الرجاء التأكد من الرابط المرسل");
            return redirect("/customer");
        }
        return view("customer.edit",compact("customers","customer_types"));
    }
    public function update(CustomerRequest $request, $id)
    {     
        $customer = Customer::find($id);
        $customer->mobile=$request["mobile"];
        $customer->phone=$request["phone"];
        $customer->address=$request["address"];
        $customer->email=$request["email"];
        $customer->updated_by=$this->user_id;
        $customer->save();
        
        \Session::flash("msg","s:تمت عملية الحفظ بنجاح");
        return redirect("/customer");
    }
    public function destroy($id)
    {
        $customer = Customer::find($id);
        if($customer->account->operations->count()>0){            
            \Session::flash("msg","w:لا يمكن حذف التصنيف لاحتوائه على عمليات");
            return redirect("/customer");
        }
        if($customer->operations->count()>0){            
            \Session::flash("msg","w:لا يمكن حذف التصنيف لاحتوائه على عمليات");
            return redirect("/customer");
        }
        $customer->account->delete();
        $customer->delete();
        
        \Session::flash("msg","s:تمت عملية الحذف بنجاح");
        return redirect("/customer");
    }
}