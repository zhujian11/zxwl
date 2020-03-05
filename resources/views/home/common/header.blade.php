@php

     $fuwus = App\Model\Fuwu::get();
     $first = App\Model\Category::where('category_pid','0')->get();
     
@endphp
<header id="header" class="header">
    <div class="container clearfix">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-menu">
                <span class="icon-bar icon-bar-1"></span>
                <span class="icon-bar icon-bar-2"></span>
                <span class="icon-bar icon-bar-3"></span>
            </button>
                        <h1 class="logo">
                <a href="" rel="home"><img src="/static/picture/logo.png" alt="{{ strip_tags(config('webconfig.web_seo_title')) }}"></a>
            </h1>
        </div>

        <nav class="collapse navbar-collapse navbar-right navbar-menu">
            <ul id="menu-%e9%a1%b6%e9%83%a8%e5%af%bc%e8%88%aa" class="nav navbar-nav main-menu wpcom-adv-menu"><li class="menu-item page-item-2 active"><a href="{{ url('/') }}">首页</a></li>
<li class="menu-item dropdown"><a href="{{ url('fuwu') }}" class="dropdown-toggle">产品与服务</a>
<ul class="dropdown-menu menu-item-wrap menu-item-col-5">
    @if(count($fuwus)>0)
        @foreach($fuwus as $fuwu)
           <li class="menu-item"><a href="{{ route('fuwuDetail',$fuwu->fuwu_id) }}">{{ $fuwu->fuwu_name }}</a></li>
        @endforeach
	@endif
</ul>
</li>

<li class="menu-item"><a href="{{ url('news') }}">新闻资讯</a></li>
@if(count($first)>0)
    @foreach($first as $v)
        <li class="menu-item dropdown"><a href="{{ route('cateDetail',$v->category_id) }}" class="dropdown-toggle">{{ $v->category_name }}</a>
            @php
                   $seconds = App\Model\Category::where('category_pid',$v->category_id)->get();
            @endphp
            @if(count($seconds)>0)
                <ul class="dropdown-menu menu-item-wrap menu-item-col-2">
                    @foreach($seconds as $second)
                    <li class="menu-item"><a href="{{ route('cateDetail',$second->category_id) }}">{{ $second->category_name }}</a></li>
                    @endforeach
                </ul>
            @endif
        </li>
    @endforeach
@endif
<!-- <li class="menu-item dropdown"><a href="{{ url('about') }}" class="dropdown-toggle">公司简介</a>
<ul class="dropdown-menu menu-item-wrap menu-item-col-2">
	<li class="menu-item"><a href="wenhua.html">企业文化</a></li>
	<li class="menu-item"><a href="chengnuo.html">服务承诺</a></li>
</ul>
</li>
<li class="menu-item dropdown"><a href="{{ url('contact') }}">联系我们</a></li> -->
</ul><!-- /.navbar-collapse -->

            <div class="navbar-action pull-right">
                                
                            </div>
        </nav>
    </div><!-- /.container -->
</header>