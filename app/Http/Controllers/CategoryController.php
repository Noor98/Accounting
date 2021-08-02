<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Category;
use DB;

class CategoryController extends AccountingBaseController
{
    public function index(Request $request)
    { 
        $q=$request["q"];
        $items = Category::whereRaw("true");//كل الامة
        if($q!="")
            $items=$items
                ->whereRaw("(name like ?)",["%$q%"]);
        $items=$items->orderby("name")->paginate(10)
            ->appends(["q"=>$q]);
        
        return view("category.index", compact("items","q"));
    }
    public function create()
    { 
        return view("category.create");
    }
    
    public function store(CategoryRequest $request)
    {                
        $item = new Category();
        $item->name=$request["name"];
        $item->created_by=$this->user_id;
        $item->save();
        
        \Session::flash("msg","s:تمت عملية الاضافة بنجاح");
        return redirect("/category/create");//->withInput();
    }
    
    public function edit($id)
    {        
        $item=Category::find($id);
        if($item==NULL){            
            \Session::flash("msg","e:الرجاء التأكد من الرابط المرسل");
            return redirect("/category");
        }
        return view("category.edit",compact("item"));
    }
    public function update(CategoryRequest $request, $id)
    {     
        $item = Category::find($id);
        $item->name=$request["name"];
        $item->updated_by=$this->user_id;
        $item->save();
        
        \Session::flash("msg","s:تمت عملية الحفظ بنجاح");
        return redirect("/category");
    }
    public function destroy($id)
    {
        $item = Category::find($id);
        if($item->items->count()>0){            
            \Session::flash("msg","w:لا يمكن حذف التصنيف لاحتوائه على اصناف");
            return redirect("/category");
        }
        $item->delete();
        
        \Session::flash("msg","s:تمت عملية الحذف بنجاح");
        return redirect("/category");
    }
}