<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $file = $request->file('file');

        //判断是否上传成功
        if(!$file->isValid()){
            return response()->json(['code'=>400,'message'=>'无效的上传文件']);
        }

        //获取源文件扩展名
        $ext = $file->getClientOriginalExtension();

        //新文件名
        $file_name = date('YmdHis').rand(1000,9999).'.'.$ext;

        //文件上传的指定路径
        $path = public_path('uploads');

        if($request->type=='fuwu'){
            $res = Image::make($file)->resize(320,200)->save($path.'/'.$file_name);
        }
        
        if($request->type=='news'){
            $res = Image::make($file)->resize(480,320)->save($path.'/'.$file_name);
        }

        if($request->type=='carousel'){
            $res = Image::make($file)->resize(1920,575)->save($path.'/'.$file_name);
        }
        

        if(!$res){
            return response()->json(['code'=>500,'message'=>'保存文件失败']);
        }

        return response()->json(['code'=>200,'message'=>$file_name]);

    }

    public function uploads(Request $request)
    {
        $files = $request->file('myfile');
        $path = public_path('uploads');
        $images = [];
        foreach($files as $file){
           
            $file_name = md5(rand(1000,9999)).'.'.$file->getClientOriginalExtension();
            $file->move($path,$file_name);
            $images[] = '/uploads/'.$file_name;
        }
        
        
        
        
        return response()->json(['errno'=>0,'data'=>$images]);
    }
}
