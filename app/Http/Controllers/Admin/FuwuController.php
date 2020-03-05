<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ramsey\Uuid\Uuid;

use App\Model\Fuwu;

class FuwuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fuwus = Fuwu::paginate(10);
        return view('admin.fuwu.fuwu-list',compact('fuwus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.fuwu.fuwu-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fuwu = new Fuwu;
        $fuwu->fuwu_id = Uuid::uuid1();
        $fuwu->fuwu_name = $request->fuwuname;
        $fuwu->fuwu_desc = $request->desc;
        $fuwu->fuwu_img = $request->uploaded_url;
        $fuwu->fuwu_content = $request->content;
        $fuwu->seo_title = $request->seo_title;
        $fuwu->seo_keywords = $request->seo_keywords;
        $fuwu->seo_description = $request->seo_content;
        $res = $fuwu->save();
        if($res){
            $data=['status'=>200,'message'=>'添加成功'];
        }else{
            $data=['status'=>400,'message'=>'添加失败'];
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
        $fuwu = Fuwu::find($id);
        return view('admin.fuwu.fuwu-edit',compact('fuwu'));
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
        $fuwu = Fuwu::find($id);
        $fuwu->fuwu_name = $request->fuwuname;
        $fuwu->fuwu_desc = $request->desc;
        $fuwu->fuwu_img = $request->uploaded_url;
        $fuwu->fuwu_content = $request->content;
        $fuwu->seo_title = $request->seo_title;
        $fuwu->seo_keywords = $request->seo_keywords;
        $fuwu->seo_description = $request->seo_content;
        $res = $fuwu->save();
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
        $fuwu = Fuwu::find($id);
        if($fuwu->delete()){
            return response()->json(['code'=>200,'message'=>'删除成功']);
        }else{
            return response()->json(['code'=>400,'message'=>'删除失败']);
        }
    }


    public function onlyName(Request $request)
    {
        $res = Fuwu::where('fuwu_name',$request->name)->first();
        if($res){
            return 1;
        }else{
            return 0;
        }
    }


    public function onlyEditName(Request $request)
    {
        if($request->name!=$request->originname){
            $res = Fuwu::where('fuwu_name',$request->name)->first();
            if($res){
                return 1;
            }else{
                return 0;
            }
        }

        return 0;
    }

    public function search(Request $request)
    {
        $fuwuname = $request->fuwuname;
        $fuwus = Fuwu::where('fuwu_name','like','%'.$fuwuname.'%')->paginate(10);
        return view('admin.fuwu.search-list',compact('fuwus','fuwuname'));
    } 
}
