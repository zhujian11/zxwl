@extends('home.layouts.app')
@section('content')
<section class="section wpcom-modules modules-swiper swiper-container swiper-normal" id="modules-1" style="margin-top: 0;margin-bottom: 20px;">
                    <div class="swiper-wrapper">

                        @if(count($cars)>0)
                          @foreach($cars as $car)
                            <div class="swiper-slide" style="height:auto;">
                                <div class="slide-img">
                                            <img src="{{ asset($car->carousel_img) }}" alt="slider">                            
                                            <div class="slide-content shadow-1">
                                                <div class="slide-content-inner container">
                                                        <p style="text-align: center;"><span style="font-size: 24px;"><strong>{{ strip_tags(config('webconfig.web_mobile')) }}</strong></span></p>
                                                        <a class="slide-btn more-link" href="{{ url('contact') }}" target="_blank">联系我们 <i class="fa fa-angle-right"></i></a>
                                                </div>
                                            </div>                    
                                </div>
                            </div>
                          @endforeach
                        @endif
                            
                    </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Navigation -->
        <div class="swiper-button-prev swiper-button-white"></div>
        <div class="swiper-button-next swiper-button-white"></div>            </section>
                <section class="section wpcom-modules modules-text container" id="modules-33" style="margin-top: 0;margin-bottom: 10px;">
            <p style="text-align: center;"><span style="font-size: 24px; color: #52c3f1;"><strong>专业物流方案定制，全国物流招投标，物流成本管控专家</strong></span></p>
        </section>
                <section class="section wpcom-modules modules-color-gird container" id="modules-2" style="margin-top: 0;margin-bottom: 20px;">
                    <ul class="cg-list clearfix cg-layout-1 cg-type-1">
                                @php 
                                     $arr = array('joomla','plane','google-wallet','archive','bandcamp','flickr','slack','gg-circle');
                                     if(count($fuwus)>0){
                                        foreach($fuwus as $k=>$v){
                                            foreach($arr as $i=>$j){
                                                if($k==$i){
                                                    $v->icon = $j;
                                                }
                                            }
                                        }
                                     }
                                @endphp
                                @if(count($fuwus)>0)
                                    @foreach($fuwus as $k=>$fuwu)
                                        <li class="cg-item cg-item-4 cg-i-{{ $k }}">
                                            <div class="cg-item-inner">
                                                <i class="fa cg-fa fa-{{ $fuwu->icon }}"></i>
                                                <div class="cg-item-text"><h3 class="cg-title">{{ $fuwu->fuwu_name }}</h3></div>
                                                <a class="cg-item-more" href="{{ route('fuwuDetail',$fuwu->fuwu_id) }}" target="_blank">查看更多</a>
                                            </div>                
                                        </li>
                                    @endforeach
                                @endif

                            
                    </ul>
            </section>
                <section class="section wpcom-modules modules-text container" id="modules-26" style="margin-top: 0;margin-bottom: 20px;">
            <h2 style="text-align: center;"><span style="font-size: 16px;">通过整合正兴物流系统资源，为客户提供基于供应链全环节的定制化物流服务，满足大型企业客户个性化的综合物流服务需求。</span><br>
<span style="font-size: 16px;">物流具有以下几个特点：资源整合化、服务定制化、管理项目化。物流运输整合公路、铁路、航空、水运及冷链等多方式的运输资源，</span><br>
<span style="font-size: 16px;">目前覆盖全国15000条运输线路，200万平方米仓储面积，为客户提供从基础物流到供应链一体化的多层次产品。</span></h2>
        </section>
                <section class="section wpcom-modules modules-fullwidth j-modules-wrap" id="modules-31" style="margin-top: ;margin-bottom: ;padding-top: ;padding-bottom: ;">
                                    <div class="j-modules-inner container-fluid">
                    <section class="section wpcom-modules modules-image-gird" id="modules-30" style="margin-top: 0;margin-bottom: 20px;">
                                <div class="sec-title">
                <div class="sec-title-wrap">
                    <h2>我们的服务简介</h2>
                    <span>全国物流运输</span>                </div>
            </div>
                <ul class="ig-list clearfix text-center">

                    @if(count($fuwus)>0)
                        @foreach($fuwus as $fuwu)
                            <li class="ig-item ig-item-4">

                                <div class="ig-item-inner">                                        
                                    <img src="{{ asset($fuwu->fuwu_img) }}" alt="{{ $fuwu->fuwu_name }}">                    
                                    <div class="ig-item-text">
                                        <h3>{{ $fuwu->fuwu_name }}</h3>                        
                                        <p>{{ $fuwu->fuwu_desc }}</p>                    
                                    </div>                
                                </div>            
                            </li>
                        @endforeach
                    @endif
                </ul>
            </section>
                </div>
            </section>
                <section class="section wpcom-modules modules-default-posts container" id="modules-34" style="margin-top: 0;margin-bottom: 20px;">
                                <div class="sec-title">
                <div class="sec-title-wrap">
                    <h2>新闻资讯</h2>
                    <span>专注于物流大件运输</span>                </div>
            </div>
                        <div class="news-wrap active">
            <ul class="post-loop post-loop-default cols-2">
                @if(count($news)>0)
                    @foreach($news as $new)
                    <li class="post-item clearfix">
                        <div class="item-img">
                            <a href="{{ route('newsDetail',$new->news_id) }}" title="{{ $new->news_title }}" target="_blank">
                                <img width="480" height="320" src="{{ $new->news_img }}" class="attachment-default size-default wp-post-image" alt="{{ $new->news_title }}">            
                            </a>
                        </div>
                        <div class="item-content">
                            <h2 class="item-title">
                                <a href="{{ route('newsDetail',$new->news_id) }}" title="{{ $new->news_title }}" target="_blank">{{ $new->news_title }}</a>
                            </h2>
                            <div class="item-excerpt">
                                <p>{{ $new->news_desc }}&#8230;</p>
                            </div>
                            <!-- <div class="item-meta">
                                <a href="news.html" rel="category tag">新闻资讯</a>            
                                <span class="item-meta-li date">2019年4月8日</span>
                            </div> -->
                        </div>
                    </li>
                    @endforeach
                @endif
            </ul>
            <div class="read-more text-center"><a class="more-link" href="{{ url('news') }}">查看更多 <i class="fa fa-angle-right"></i></a></div>        </div>
                    </section>
                <section class="section wpcom-modules modules-carousel_slider container" id="modules-10" style="margin-top: 0;margin-bottom: 20px;">
                                <div class="sec-title">
                <div class="sec-title-wrap">
                    <h2>合作伙伴</h2>
                                    </div>
            </div>
                <div class="carousel-slider">
            <div class="j-slider-10 cs-inner">
                <ul class="swiper-wrapper">
                                            <li class="swiper-slide">
                                                            <a href="javascript:;" target="_blank">
                                    <img src="static/picture/2019040812575333.jpg" alt="最好科技">                                    <span class="item-title">最好科技</span>                                </a>
                                                    </li>
                                            <li class="swiper-slide">
                                                            <a href="javascript:;" target="_blank">
                                    <img src="static/picture/2019040812575498.jpg" alt="百度">                                    <span class="item-title">百度</span>                                </a>
                                                    </li>
                                    </ul>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
        <script>
                        jQuery(document).ready(function(){
                new Swiper('.j-slider-10', {
                    paginationClickable: true,
                    autoplay: 4000,
                    loop: true,
                    effect: 'slide',
                    slidesPerView: 6,
                    spaceBetween: 10,
                    slidesPerGroup: 3,
                    nextButton: '.swiper-button-next',
                    prevButton: '.swiper-button-prev',
                    simulateTouch: false,
                    // Responsive breakpoints
                    breakpoints: {
                        480: {
                            slidesPerView: 2,
                            slidesPerGroup: 2,
                            spaceBetweenSlides: 10
                        },
                        767: {
                            slidesPerView: 2,
                            slidesPerGroup: 2,
                            spaceBetweenSlides: 10
                        },
                        1024: {
                            slidesPerView: 4,
                            spaceBetweenSlides: 15
                        }
                    },
                    onSlideChangeEnd: function(){
                        jQuery(window).trigger('scroll');
                    }
                });
            })
        </script>
            </section>
@endsection
@push('scripts')
    <script>
           function load(){
              
           }
    
    </script>
@endpush