<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use Ramsey\Uuid\Uuid;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorys = Category::paginate(10);
        return view('admin.category.category-list',compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topcates = Category::where('category_pid','0')->get();
        return view('admin.category.category-add',compact('topcates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cate = new Category;
        $cate->category_id = Uuid::uuid1();
        $cate->category_name = $request->categoryname;
        $cate->category_pid = $request->category_pid;
        $cate->category_content = $request->content;
        $cate->seo_title = $request->seo_title;
        $cate->seo_keywords = $request->seo_keywords;
        $cate->seo_description = $request->seo_content;
        $res = $cate->save();
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
        $cate = Category::find($id);
        $topcates = Category::where('category_pid','0')->get();
        return view('admin.category.category-edit',compact('cate','topcates'));

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
        $cate = Category::find($id);
        $cate->category_name = $request->catename;
        $cate->category_pid = $request->category_pid;
        $cate->category_content = $request->content;
        $cate->seo_title = $request->seo_title;
        $cate->seo_keywords = $request->seo_keywords;
        $cate->seo_description = $request->seo_content;
        $res = $cate->save();
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
        $id = explode(',',$id);
        $res = Category::destroy($id);
        if($res){
            return response()->json(['code'=>200,'message'=>'删除成功','ids'=>$id]);
        }else{
            return response()->json(['code'=>400,'message'=>'删除失败']);
        }
    }

    public function search(Request $request)
    {
        $categoryname = $request->categoryname;
        $categorys = Category::where('category_name','like','%'.$categoryname.'%')->paginate(10);
        return view('admin.category.search-list',compact('categorys','categoryname'));
    }

    public function onlyName(Request $request)
    {
        $res = Category::where('category_name',$request->name)->first();
        if($res){
            return 1;
        }else{
            return 0;
        }
    }

    public function onlyEditName(Request $request)
    {
        if($request->name != $request->originname){
            $res = Category::where('category_name',$request->name)->first();
            if($res){
                return 1;
            }else{
                return 0;
            }
        }

        return 0;
    }

    public function hasSon(Request $request)
    {
        $res = Category::hasChildrenCate($request->id);
        
        if($res){
            $res = implode(',',$res);
            return response()->json(['status'=>1,'message'=>'此栏目下有子栏目,若删除该栏目其子栏目也将被删除,确认继续吗？','id'=>$res]);
        }else{
            return response()->json(['status'=>0,'message'=>'','id'=>$request->id]);
        }
    }
}
