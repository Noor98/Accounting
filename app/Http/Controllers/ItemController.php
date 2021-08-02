<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Item;
use App\Category;
use App\Unit;
use DB;

class ItemController extends AccountingBaseController
{
    public function index(Request $request){
          
        $q=$request["q"];
        $category_id=$request["category_id"];
        $unit_id=$request["unit_id"];
            
        $items=Item::whereRaw("true");//كل الامة
        if($q!="")
            $items=$items
                ->whereRaw(("(name like ?)"),["%$q%"]);
        if($category_id!="")
            $items=$items->whereRaw("category_id = ?",[$category_id]);
        if($unit_id!="")
            $items=$items->whereRaw("unit_id = ?",[$unit_id]);
        
        $items=$items->orderby("name")->paginate(10)
            ->appends(["q"=>$q,"category_id"=>$category_id,"unit_id"=>$unit_id]);
        
        
        $units=Unit::get();
        $categories=Category::get();
        return view("item.index",compact("items","q","category_id","unit_id",
                    "units","categories"));
    
    }
     
    public function create(){
        $units=Unit::get();
        $categories=Category::get();
        return view("item.create",compact("units","categories"));    
    }
    public function store(ItemRequest $request)
    {    
        $item = new Item();
        $item->name=$request["name"];
        $item->unit_id=$request["unit_id"];
        $item->category_id=$request["category_id"];
        $item->sell_price=$request["sell_price"];
        $item->buy_price=$request["buy_price"];
        $item->balance=0;
        $item->created_by=$this->user_id;
        $item->save();
        
        \Session::flash("msg","s:تمت عملية الاضافة بنجاح");
        return redirect("/item/create");
    }
    public function update(ItemRequest $request, $id)
    {     
        $item = Item::find($id);
        $item->name=$request["name"];
        $item->unit_id=$request["unit_id"];
        $item->category_id=$request["category_id"];
        $item->sell_price=$request["sell_price"];
        $item->buy_price=$request["buy_price"];
        $item->updated_by=$this->user_id;
        $item->save();
        
        \Session::flash("msg","s:تمت عملية الحفظ بنجاح");
        return redirect("/item");
    }
    public function edit($id)
    {        
        $item=Item::find($id);
        if($item==NULL){            
            \Session::flash("msg","e:الرجاء التأكد من الرابط المرسل");
            return redirect("/item");
        }
        $units=Unit::get();
        $categories=Category::get();
        return view("item.edit",compact("item","units","categories"));   
    }
    public function destroy($id)
    {
        
        $item = Item::find($id);
        /*if($item->items->count()>0){            
            \Session::flash("msg","w:لا يمكن حذف التصنيف لاحتوائه على اصناف");
            return redirect("/item");
        }*/
        $item->delete();
        
        \Session::flash("msg","s:تمت عملية الحذف بنجاح");
        return redirect("/item");
    }
    
}
