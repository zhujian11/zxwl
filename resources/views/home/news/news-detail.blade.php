@extends('home.layouts.app')
@section('content')
<div class="container wrap">
        <div class="main">
            <ol class="breadcrumb" vocab="https://schema.org/" typeof="BreadcrumbList">
               <li class="home" property="itemListElement" typeof="ListItem"><i class="fa fa-map-marker"></i> <a href="{{ url('/') }}" property="item" typeof="WebPage">首页</a><meta property="position" content="1"></li>
               <li property="itemListElement" typeof="ListItem"><a href="{{ url('news') }}" property="item" typeof="WebPage"><span property="name">新闻资讯</span></a><meta property="position" content="2"></li>
            </ol>                        
            <div class="entry">
                <h1 class="entry-title">{{ $news->news_title }}</h1>
                <div class="entry-meta">
                                        <span><i class="fa fa-folder-open-o"></i> <a href="{{ url('news') }}" rel="category tag">新闻资讯</a></span>
                    <span><i class="fa fa-calendar"></i> {{ $news->created_at }}</span>
                                    </div>
                <div class="entry-content clearfix">
                    {!! $news->news_content !!}
                </div>

                
                <div class="entry-footer">
                    <div class="entry-tag"></div>
                    <div class="entry-page">
                        @if(!empty($prev))
                        <p>上一篇：<a href="{{ route('newsDetail',$prev->news_id) }}" rel="prev">{{ $prev->news_title }}</a></p>
                        @endif
                        @if(!empty($next))
                        <p>下一篇：<a href="{{ route('newsDetail',$next->news_id) }}" rel="next">{{ $next->news_title }}</a></p>
                        @endif
                    </div>
                </div>
                <h3 class="entry-related-title">相关新闻</h3>
                <ul class="entry-related clearfix ">
                    @if(!empty($similar_news))
                        @foreach($similar_news as $v)
                        <li><a href="{{ route('newsDetail',$v->news_id) }}" title="{{ $v->news_title }}">{{ $v->news_title }}</a></li>
                        @endforeach
                    @endif
                </ul>                            
            </div>
                    
        </div>
                    @component('home.component.aside')
                    @endcomponent
                   
    </div>
@endsection
@push('scripts')
    <script>
           function load(){
              $('title').text('{{ $news->seo_title }}-{{ strip_tags(config("webconfig.web_seo_title")) }}');
              $('meta[name="keywords"]').attr('content','{{ $news->seo_keywords }}');
              $('meta[name="description"]').attr('content','{{ $news->seo_description }}');
           }
    
    </script>
@endpush