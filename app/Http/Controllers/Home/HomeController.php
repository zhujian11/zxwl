<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Carousel;
use App\Model\Fuwu;
use App\Model\News;
use App\Model\Category;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /* 首页 */
    public function index()
    {
          //轮播
          $cars = Carousel::where('carousel_status',1)->take(3)->get();

          //我们的服务简介
          $fuwus = Fuwu::take(8)->get();

          //新闻资讯
          $news = News::take(4)->get();

          return view('home.index',compact('cars','fuwus','news'));
    }

    /* 新闻资讯 */
    public function news()
    {
          $news = News::orderByDesc('created_at')->paginate(10);
          return view('home.news.news-list',compact('news'));
    }

    public function newsDetail($id)
    {

          $news = News::find($id);

          //上一篇

          $prev = News::where('news_id','<',$id)->orderByDesc('news_id')->take(1)->first();
          
          //下一篇

          $next = News::where('news_id','>',$id)->orderBy('news_id','asc')->take(1)->first();

          //相关文章

          $res = [];//存储大于60的百分比结果

          $arr = News::pluck('news_title','news_id')->all();
      
          foreach($arr as $k=>$v){
              if($k == $news->news_id){
                  unset($arr[$k]);
              }
          }

          if($arr){
                foreach($arr as $k=>$v){
                    similar_text($news->news_title,$v,$percent);
                    $res[$k] = $percent;
                }
    
                arsort($res);
          }
          

          if($res){
              foreach($res as $k=>$v){
                  if($v<60){
                      unset($res[$k]);
                  }

              }
          }

          $similar_news = [];
          if($res){
              foreach($res as $k=>$v){
                  $similar_news[] = News::where('news_id',$k)->first();
              }
          }

          return view('home.news.news-detail',compact('news','prev','next','similar_news'));

    }

    /* 产品与服务 */

    public function fuwu()
    {

        $fuwus = Fuwu::take(8)->get();
        
        return view('home.fuwu.fuwu-list',compact('fuwus'));

    }

    public function fuwuDetail($id)
    {

        $fuwu = Fuwu::find($id);

        return view('home.fuwu.fuwu-detail',compact('fuwu'));

    }

    /* 栏目详情页 */

    public function cateDetail($id)
    {

         $cate = Category::find($id);

         if($cate->category_pid == '0'){

             return view('home.category.category-first',compact('cate'));

         }else{

             return view('home.category.category-second',compact('cate'));

         }

    }

    /* 搜索关键字 */

    public function search(Request $request)
    {

        $input = $request->all();
        
        $first = DB::table('wl_category')
                     ->where('category_name','like','%'.$input['s'].'%')
                     ->orWhere('category_content','like','%'.$input['s'].'%')
                     ->select('category_name as name','category_id as id');

        $second = DB::table('wl_fuwu')
                    ->where('fuwu_name','like','%'.$input['s'].'%')
                    ->orWhere('fuwu_content','like','%'.$input['s'].'%')
                    ->select('fuwu_name as name','fuwu_id as id');

        $res = DB::table('wl_news')
                    ->where('news_title','like','%'.$input['s'].'%')
                    ->orWhere('news_content','like','%'.$input['s'].'%')
                    ->select('news_title as name','news_id as id')
                    ->union($first)
                    ->union($second)
                    ->get();

        $res = $res->toArray();

        // dd($res);

        $news = [];

        $fuwus = [];

        $cates = [];

        foreach($res as $v){
            $news[] = News::where('news_id',$v->id)->first();
        }

        foreach($res as $v){
            $fuwus[] = Fuwu::where('fuwu_id',$v->id)->first();
        }

        foreach($res as $v){
            $cates[] = Category::where('category_id',$v->id)->first();
        }

        $fuwus = array_filter($fuwus);

        $news = array_filter($news);

        $cates = array_filter($cates);

        return view('home.search.search-list',compact('fuwus','news','cates','input'));

    }

}
