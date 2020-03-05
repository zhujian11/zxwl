@extends('home.layouts.app')
@section('content')
    <div class="container wrap">
        <div class="main">
            <ol class="breadcrumb" vocab="https://schema.org/" typeof="BreadcrumbList">
               <li class="home" property="itemListElement" typeof="ListItem">
                   <i class="fa fa-map-marker"></i> <a href="{{ url('/') }}" property="item" typeof="WebPage">首页</a>
                   <meta property="position" content="1">
                </li>
               <li class="active" property="itemListElement" typeof="ListItem"><a href="{{ url('news') }}" property="item" typeof="WebPage"><span property="name">新闻资讯</span></a><meta property="position" content="2"></li>
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
            </ul>
            {{ $news->links() }}
        </div>
        
                    @component('home.component.aside')
                    @endcomponent
    </div>
    @push('styles')
        <style>

            ul.pagination{
                list-style:none;
            }
            ul.pagination li{
                float:left;
            }
        </style>
    @endpush
    
@endsection
@push('scripts')
    <script>
           function load(){
              $('title').text('新闻资讯-{{ strip_tags(config("webconfig.web_seo_title")) }}');
              $('meta[name="keywords"]').attr('content','新闻资讯');
              $('meta[name="description"]').attr('content','新闻资讯');
           }
    
    </script>
@endpush