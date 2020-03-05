<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::where([])->orderByDesc('created_at')->paginate(10);
        return view('admin.news.news-list',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.news-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news = new News;
        $news->news_title = $request->newsname;
        $news->news_desc = $request->desc;
        $news->news_img = $request->uploaded_url;
        $news->news_content = $request->content;
        $news->seo_title = $request->seo_title;
        $news->seo_keywords = $request->seo_keywords;
        $news->seo_description = $request->seo_content;
        $res = $news->save();
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
        $news = News::find($id);
        return view('admin.news.news-edit',compact('news'));
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
        $news = News::find($id);
        $news->news_title = $request->newsname;
        $news->news_desc = $request->desc;
        $news->news_img = $request->uploaded_url;
        $news->news_content = $request->content;
        $news->seo_title = $request->seo_title;
        $news->seo_keywords = $request->seo_keywords;
        $news->seo_description = $request->seo_content;
        $res = $news->save();
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
        $res = News::destroy($id);
        if($res){
            return response()->json(['code'=>200,'message'=>'删除成功']);
        }else{
            return response()->json(['code'=>400,'message'=>'删除失败']);
        }
    }

    public function search(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        $newsname = $request->newsname;
        $where = [];
        $where1 = ['created_at','<',$end];
        $where2 = ['created_at','>',$start];
        $where3 = ['news_title','like','%'.$newsname.'%'];
        if(!empty($start) && !empty($end)){
            $where = [$where1,$where2,$where3];
        }
        if(!empty($start) && empty($end)){
            $where = [$where2,$where3];
        }
        if(empty($start) && !empty($end)){
            $where = [$where1,$where3];
        }
        if(empty($start) && empty($end)){
            $where = [$where3];
        }
        $news = News::where($where)->paginate(10);
        return view('admin.news.search-list',compact('news','start','end','newsname'));
    }
}
