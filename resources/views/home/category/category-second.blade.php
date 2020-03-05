@extends('home.layouts.app')
@section('content')
   <div class="container wrap">
        <div class="main">
            <ol class="breadcrumb" vocab="https://schema.org/" typeof="BreadcrumbList">
                <li class="home" property="itemListElement" typeof="ListItem">
                    <i class="fa fa-map-marker"></i> 
                    <a href="{{ url('/') }}" property="item" typeof="WebPage">首页</a>
                    <meta property="position" content="1">
                </li>
                <li class="active" property="itemListElement" typeof="ListItem">
                    <a href="{{ route('cateDetail',$cate->category_id) }}" property="item" typeof="WebPage"><span property="name">{{ $cate->category_name }}</span></a>
                    <meta property="position" content="2">
                </li>
            </ol>                            
            <div class="entry">
                    <div class="entry-content">
                        {!! $cate->category_content !!}

                    </div>
            </div>
        </div>
                    @component('home.component.aside')
                    @endcomponent
    </div>
@endsection
@push('scripts')
    <script>
           function load(){
              $('title').text('{{ $cate->seo_title }}-{{ strip_tags(config("webconfig.web_seo_title")) }}');
              $('meta[name="keywords"]').attr('content','{{ $cate->seo_keywords }}');
              $('meta[name="description"]').attr('content','{{ $cate->seo_description }}');
           }
    
    </script>
@endpush

