@extends('home.layouts.app')
@section('content')
    <div class="container wrap">
        <div class="main">
            <ol class="breadcrumb" vocab="https://schema.org/" typeof="BreadcrumbList">
               <li class="home" property="itemListElement" typeof="ListItem">
                   <i class="fa fa-map-marker"></i> <a href="{{ url('/') }}" property="item" typeof="WebPage">首页</a>
                   <meta property="position" content="1">
                </li>
               <li class="active">搜索：{{ $input['s'] }}</li>
            </ol>            
            <ul class="post-loop post-loop-default cols-3 clearfix">
                @if(count($news)>0)
                    @foreach($news as $new)                    
                    <li class="post-item clearfix">
                                <div class="item-img">
                                    <a href="{{ route('newsDetail',$new->news_id) }}" title="{{ $new->news_title }}" target="_blank">
                                        <img width="480" height="320" src="{{ asset($new->news_img) }}" class="attachment-default size-default wp-post-image" alt="{{ $new->news_title }}">            
                                    </a>
                                </div>
                                <div class="item-content">
                                    <h2 class="item-title">
                                        <a href="{{ route('newsDetail',$new->news_id) }}" title="{{ $new->news_title }}" target="_blank">{{ $new->news_title }}</a>
                                    </h2>
                                    <div class="item-excerpt">
                                        <p>{{ $new->news_desc }}&#8230;</p>
                                    </div>
                                    <div class="item-meta">
                                        <a href="{{ url('news') }}" rel="category tag">新闻资讯</a>            
                                        <span class="item-meta-li date">{{ $new->created_at }}</span>
                                    </div>
                                </div>
                    </li>
                    @endforeach                                    
                @endif 
                
                @if(count($fuwus)>0)
                    @foreach($fuwus as $fuwu)
                    <li class="post-item item-no-img clearfix">
                            <div class="item-content">
                            <h2 class="item-title">
                                <a href="{{ route('fuwuDetail',$fuwu->fuwu_id) }}" title="{{ $fuwu->fuwu_name }}" target="_blank">{{ $fuwu->fuwu_name }}</a>
                            </h2>
                            <div class="item-excerpt">
                                <p>{{ $fuwu->fuwu_desc }}…</p>
                            </div>
                            <div class="item-meta">
                                            <span class="item-meta-li date" style="margin-left:0;">{{ $fuwu->created_at }}</span>
                            </div>
                        </div>
                    </li>
                    @endforeach                                    
                @endif

                @if(count($cates)>0)
                    @foreach($cates as $cate)
                    <li class="post-item item-no-img clearfix">
                            <div class="item-content">
                            <h2 class="item-title">
                                <a href="{{ route('cateDetail',$cate->category_id) }}" title="{{ $cate->category_name }}" target="_blank">{{ $cate->category_name }}</a>
                            </h2>
                            <div class="item-excerpt"></div>
                            <div class="item-meta">
                                            <span class="item-meta-li date" style="margin-left:0;">{{ $cate->created_at }}</span>
                            </div>
                        </div>
                    </li>
                    @endforeach                                    
                @endif
                @if(empty($fuwus) && empty($news) && empty($cates))
                    <p style="padding: 15px 0;">抱歉，你搜索的内容未找到，请尝试使用其他关键词搜索。</p>
                @endif
            </ul>
            
        </div>
        
                    @component('home.component.aside')
                    @endcomponent
    </div>
    
    
@endsection
@push('scripts')
    <script>
           function load(){
              $('title').text('{{ $input["s"] }}-搜索结果-{{ strip_tags(config("webconfig.web_seo_title")) }}');
           }
    
    </script>
@endpush