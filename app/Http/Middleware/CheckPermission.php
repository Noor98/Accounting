<?php

namespace App\Http\Middleware;
use App\Admin;//Model
use Closure;

class CheckPermission
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
		$user = \Auth::user();
		//echo $user->id;
        //die();		
		//الرابط المطلوب
        //App\Http\Controllers\CMS\CategoryController@index
		$currentAction = \Route::currentRouteAction();
        //echo $currentAction;die();
        if($user!=NULL){
            $admin=Admin::where("users_id",$user->id)->first();		
            if($admin->active==0){
                 \Auth::logout();
                 \Session::flash("msg","تم تعديل المستخدم من قبل الادارة العليا");
		         return redirect("/login?active=0");	
            }
            \Session::flash("adminId",$admin->id);
			//الرابط المطلوب
			//example  App\Http\Controllers\FooBarController@index
			list($controller, $method) = explode('@', $currentAction);
			// $controller now is "App\Http\Controllers\FooBarController"		
			$controller = strtolower(preg_replace('/.*\\\/', '', $controller));
			$controller=str_replace("controller","",$controller);			
			if($method=="index")
				$method="";
            else
                $method="/$method";
			$url="/$controller".$method;
			//echo $url;die();
			$link=\DB::table("link")->where("url",$url)->first();
            //echo $link->id;
            //die();
			//معناه انه الرابط عليه صلاحيات
			if($link!=NULL)
			{
				$haveAdminThisLink=\DB::table("admin_link")
					->where("link_id",$link->id)
					->where("admin_id",$admin->id)
					->count();
				if($haveAdminThisLink==0){					
					return redirect('/home/noaccess');
				}
			}
		}
        return $response;
    }
}
