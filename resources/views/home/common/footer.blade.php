

@php
$fuwus = App\Model\Fuwu::take(8)->get();
$cates = App\Model\Category::get();
@endphp

<footer class="footer">
        <div class="container">
        <div class="footer-widget row hidden-xs">
            <div id="nav_menu-3" class="col-md-2 col-sm-4 hidden-xs widget widget_nav_menu"><div class="menu-%e9%a1%b5%e8%84%9a%e8%8f%9c%e5%8d%95%e4%b8%80-container">
                <ul id="menu-%e9%a1%b5%e8%84%9a%e8%8f%9c%e5%8d%95%e4%b8%80" class="menu">
                @if(count($cates)>0)
                    @foreach($cates as $cate)
                    <li id="menu-item-174" class="menu-item menu-item-174"><a href="{{ route('cateDetail',$cate->category_id) }}">{{ $cate->category_name }}</a></li>
                    @endforeach
	            @endif 

</ul></div></div><div id="nav_menu-4" class="col-md-2 col-sm-4 hidden-xs widget widget_nav_menu"><div class="menu-%e9%a1%b5%e8%84%9a%e8%8f%9c%e5%8d%95%e4%ba%8c-container">
    <ul id="menu-%e9%a1%b5%e8%84%9a%e8%8f%9c%e5%8d%95%e4%ba%8c" class="menu">
    @if(count($fuwus)>0)
        @foreach($fuwus as $fuwu)
        <li id="menu-item-312" class="menu-item menu-item-312"><a href="{{ route('fuwuDetail',$fuwu->fuwu_id) }}">{{ $fuwu->fuwu_name }}</a></li>
        @endforeach
	@endif
</ul></div></div>
<div id="wpcom-image-ad-2" class="col-md-2 col-sm-4 hidden-xs widget widget_image_ad">            
{!! config('webconfig.web_ewm') !!}       
</div>
<div id="nav_menu-5" class="col-md-2 col-sm-4 hidden-xs widget widget_nav_menu">
    <div class="menu-%e9%a1%b5%e8%84%9a%e8%8f%9c%e5%8d%95%e4%b8%89-container">
        <ul id="menu-%e9%a1%b5%e8%84%9a%e8%8f%9c%e5%8d%95%e4%b8%89" class="menu">
            

</ul></div></div>                            <div class="col-md-3 col-md-offset-1 col-sm-8 col-xs-12 widget widget_contact">
                    <h3 class="widget-title">服务热线</h3>
                    <div class="widget-contact-wrap">
                        <div class="widget-contact-tel">{{ strip_tags(config('webconfig.web_mobile')) }}</div>
                        <div class="widget-contact-time">{{ strip_tags(config('webconfig.web_worktime')) }}</div>
                        <div class="widget-contact-snslol" style="margin-top:14px;">邮箱：{{ strip_tags(config('webconfig.web_email')) }}</div>
                        <div class="widget-contact-snslol" style="margin-top:14px;">网址：{{ strip_tags(config('webconfig.web_url')) }}</div>
                        <div class="widget-contact-snslol" style="margin-top:14px;">地址：{{ strip_tags(config('webconfig.web_address')) }}</div>
                    </div>
                </div>
                    </div>
                        <div class="copyright">
                        <p>{{ strip_tags(config('webconfig.web_copyright')) }}</p>
        </div>
    </div>
</footer>
