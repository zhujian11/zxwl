@php
	 $fuwus = App\Model\Fuwu::get();
	 $cates = App\Model\Category::where('category_pid','0')->skip(1)->take(2)->get();
	 $news = App\Model\News::orderByDesc('created_at')->take(5)->get();
@endphp
<aside class="sidebar">
	<div id="search-2" class="widget widget_search">
		<form class="search-form" action="{{ route('searchKeywords') }}" method="get" role="search">
			<input type="text" class="keyword" name="s" placeholder="输入关键词搜索..." value="">
			<input type="submit" class="submit" value="&#xf002;">
		</form>
	</div>
	<div id="nav_menu-6" class="widget widget_nav_menu">
		<h3 class="widget-title">
			<span>{{ strip_tags(config('webconfig.web_title')) }}</span>
		</h3>
		<div class="menu-%e9%bb%98%e8%ae%a4%e8%be%b9%e6%a0%8f-container">
	    <ul id="menu-%e9%bb%98%e8%ae%a4%e8%be%b9%e6%a0%8f" class="menu">


		@if(count($fuwus)>0)
		   @foreach($fuwus as $fuwu)
	           <li id="menu-item-464" class="menu-item menu-item-464"><a href="{{ route('fuwuDetail',$fuwu->fuwu_id) }}">{{ $fuwu->fuwu_name }}</a></li>
		   @endforeach
		@endif


			   <li id="menu-item-456" class="menu-item menu-item-456"><a href="{{ url('news') }}">新闻资讯</a></li>


		@if(count($cates)>0)
		   @foreach($cates as $cate)
                <li id="menu-item-302" class="menu-item menu-item-302"><a href="{{ route('cateDetail',$cate->category_id) }}">{{ $cate->category_name }}</a></li>
           @endforeach
		@endif


		</ul>
	    </div>
    </div>		
<div id="recent-posts-2" class="widget widget_recent_entries">		
	<h3 class="widget-title"><span>最新资讯</span></h3>		
	<ul>
	    @if(count($news)>0)
		  @foreach($news as $v)					
	      <li><a href="{{ route('newsDetail',$v->news_id) }}">{{ $v->news_title }}</a></li>
		  @endforeach
		@endif			
							
	</ul>
		</div>
		    <div id="wpcom-image-ad-3" class="widget widget_image_ad">
			{!! config('webconfig.web_ewm') !!}        
			</div>            
		</aside>