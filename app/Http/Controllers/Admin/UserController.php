<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $users = User::paginate();
        return view('admin.user.admin-list',compact('users'));
        
     

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
  
        return view('admin.user.admin-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
           
        $res = User::create(['user_id'=>Uuid::uuid1(),'user_name'=>$request->username,'user_email'=>$request->email,'user_password'=>Hash::make($request->pass)]);
        if($res){
            $data = [
                 'status'=>0,
                 'message'=>'添加成功'
            ];
        }else{
            $data = [
                 'status'=>1,
                 'message'=>'添加失败'
            ];
        }
        return $data;
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.user.admin-edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->user_name = $request->username;
        $user->user_email = $request->email;
        $res = $user->save();
        if($res){
            $data=['status'=>200,'message'=>'编辑成功'];
        }else{
            $data=['status'=>400,'message'=>'编辑失败'];
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = User::destroy($id);
        if($res){
            return response()->json(['code'=>200,'message'=>'删除成功']);
        }else{
            return response()->json(['code'=>400,'message'=>'删除失败']);
        }
    }


    public function onlyName(Request $request)
    {
        $result = User::where('user_name',$request->name)->first();
        if($result){
             return 1;
        }else{
             return 0;
        }
    }


    public function onlyEmail(Request $request)
    {
        $result = User::where('user_email',$request->email)->first();
        if($result){
             return 1;
        }else{
             return 0;
        }
    }

    public function search(Request $request)
    {
        $username = $request->username;
        $email = $request->email;
        $users = User::where('user_name','like','%'.$username.'%')->where('user_email','like','%'.$email.'%')->paginate(10);
        return view('admin.user.search-list',compact('users','username','email'));
    }

    public function onlyEditName(Request $request)
    {
        if($request->name!=$request->originname){
            $res = User::where('user_name',$request->name)->first();
            if($res){
                return 1;
            }else{
                return 0;
            }
        }

        return 0;
    }

    public function onlyEditEmail(Request $request)
    {
        if($request->email!=$request->originemail){
            $res = User::where('user_email',$request->email)->first();
            if($res){
                return 1;
            }else{
                return 0;
            }
        }

        return 0;
    }

    public function passReset($id)
    {
        $user = User::find($id);
        return view('admin.user.admin-passreset',compact('user'));
    }

    public function doReset(Request $request)
    {
        $user = User::find($request->user_id);
        $user->user_password = Hash::make($request->pass);
        $res = $user->save();
        if($res){
            $request->session()->forget('user');
            $data = [
                 'status'=>0,
                 'message'=>'修改成功,请重新登录!'
            ];
        }else{
            $data = [
                 'status'=>1,
                 'message'=>'修改失败'
            ];
        }
        return $data;
    }

    
}
