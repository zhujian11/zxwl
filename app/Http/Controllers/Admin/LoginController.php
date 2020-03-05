<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Model\User;

class LoginController extends Controller
{
    /* 处理后台登录 */
    public function doLogin(Request $request)
    {
    	  /* 后端表单验证数据 */

          $input = $request->except(['_token']);
          
    	  $validator = Validator::make($input,[
                 'username'=>'required',
                 'password'=>'required',
                 'code'=>'required|captcha',
                 

    	  	],[
                 'username.required'=>'用户名不能为空',
                 
                 'password.required'=>'密码不能为空',
                 'code.required'=>'验证码不能为空',
                 'code.captcha'=>'验证码错误',
                 
                 
                 

    	  	]);

    	  if($validator->fails()){
    	  	     return redirect('/admin/login')
			    	  	     ->withErrors($validator)
			    	  	     ->withInput();
    	  }

          /* 后台登录逻辑 */

          $user = User::where('user_name',$request->username)->first();

          if(!$user){
          	    return redirect('/admin/login')->with('errors','用户名出错');
          }

          if(!Hash::check($request->password,$user->user_password)){
          	    return redirect('/admin/login')->with('errors','密码出错'); 
          }

          /* 保存用户信息到session中 */

          session(['user'=>$user]);

          /* 跳转到后台首页 */

          return redirect('/admin/index');


    }


    /* 后台退出登录 */
    public function loginOut(Request $request)
    {
    	   $request->session()->flush();

    	   return redirect('/admin/login');
    }
}
