<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\adminRequest;
use App\Admin;
use App\User;
use DB;

class AdminController extends AccountingBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
       public function index(Request $request)
    { 
        $q=$request["q"];
        $admins = Admin::whereRaw("1=1");//كل الامة
        if($q!="")
            $admins=$admins
                ->whereRaw("and (name like ?or email like? or phone like?)",["%$q%","%$q%","%$q%"]);
        $admins=$admins->orderby("name")->paginate(4)
            ->appends(["q"=>$q]);
        
        return view("admin.index", compact("admins","q"));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view("admin.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(adminRequest $request)
    {
        $isExists=User::where("email",$request['email'])->count();
        if($isExists){
            \Session::flash("msg","e:البريد الالكتروني موجود مسبقا");
            return redirect("/admin/create")->withInput();   
        }
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);
        
        $admin= new Admin();
        $admin->name=$request["name"];
        $admin->email=$request["email"];
        $admin->phone=$request["phone"];
        $admin->active=$request["active"]?1:0;
        $admin->created_by=$this->user_id;
        $admin->users_id=$user->id;
        $admin->save();
        
        \Session::flash("msg","s:تمت عملية الاضافة بنجاح");
        return redirect("/admin/create");//->withInput();    
    }

    public function edit($id)
    {
         $admin=admin::find($id);
        if($admin==NULL){            
            \Session::flash("msg","e:الرجاء التأكد من الرابط المرسل");
            return redirect("/admin");
        }
        return view("admin.edit",compact("admin"));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(adminRequest $request, $id)
    {
        $admin = admin::find($id);
        $user = User::find($admin->users_id);
        $user->name=$request["name"];
        if($request["password"]!=""){
            $user->password=bcrypt($request['password']);
        }
        $user->save();
        
        $admin->name=$request["name"];
        $admin->phone=$request["phone"];
        $admin->active=$request["active"]?1:0;
        $admin->updated_by=$this->user_id;
        $admin->save();
        
        \Session::flash("msg","s:تمت عملية الحفظ بنجاح");
        return redirect("/admin");
    }
    
    public function permission($id)
    {
         $admin=admin::find($id);
        if($admin==NULL){            
            \Session::flash("msg","e:الرجاء التأكد من الرابط المرسل");
            return redirect("/admin");
        }
        return view("admin.permission",compact("admin"));
        //
    }
    public function setpermission($id,Request $request)
    {        
        /*echo $id;
        print_r($request["permission"]);
        die();*/
        \DB::table("admin_link")->where("admin_id",$id)->delete();
        if(!empty($request["permission"])){
            foreach($request["permission"] as $p){
                \DB::table("admin_link")->insert(["admin_id"=>$id,
                                                 "link_id"=>$p]);
            }
        }
        \Session::flash("msg","s:تم حفظ الصلاحيات بنجاح");
            return redirect("/admin/$id/permission");
    }
}
