<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<meta name="renderer" content="webkit">
<meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1,width=device-width">
<meta name="format-detection" content="telephone=no">
<title>{{ strip_tags(config('webconfig.web_seo_title')) }}</title>
<meta name="keywords" content="{{ strip_tags(config('webconfig.web_seo_keywords')) }}">
<meta name="description" content="{{ strip_tags(config('webconfig.web_seo_description')) }}">
<link rel="canonical" href="">
<meta name="applicable-device" content="pc,mobile">
<meta http-equiv="Cache-Control" content="no-transform">



<link rel='stylesheet' id='stylesheet-css' href='{{ asset("static/css/style-4.3.1.css") }}' type='text/css' media='all'>
<link rel='stylesheet' id='wp-block-library-css' href='{{ asset("static/css/style.min-5.3.2.css") }}' type='text/css' media='all'>
<script type='text/javascript' src='{{ asset("static/js/jquery.min-1.12.4.js") }}'></script>
<script type='text/javascript' src='{{ asset("static/js/jquery-migrate.min-1.4.1.js") }}'></script>

<link rel='shortlink' href=''>
<link rel="stylesheet" href="{{ asset('static/css/style.css') }}">
<script> (function() {if (!/*@cc_on!@*/0) return;var e = "abbr, article, aside, audio, canvas, datalist, details, dialog, eventsource, figure, footer, header, hgroup, mark, menu, meter, nav, output, progress, section, time, video".split(', ');var i= e.length; while (i--){ document.createElement(e[i]) } })()</script>
<!--[if lte IE 8]><script src="{{ asset('static/js/respond.min.js') }}"></script><![endif]-->
@stack('styles')
</head>
<body class="home page-template page-template-page-home page-template-page-home-php page page-id-2 lang-cn" onload="load();">
@include('home.common.header')

<div id="wrap">        
   @yield('content')  
</div>
@include('home.common.footer')

<div class="action" style="top:50%;">
            <div class="a-box contact">
            <div class="contact-wrap">
                <h3 class="contact-title">联系我们</h3>
                <h4 style="text-align: center;">
                <span style="color: #2d6ded;">
                <strong>{{ strip_tags(config('webconfig.web_mobile')) }}</strong></span>
                </h4>
<!-- <p><strong>在线咨询：<a href="javascript:;" target="_blank" rel="noopener">
    <img class="alignnone" title="点击这里给我发消息" src="{{ asset('static/picture/button_111.gif') }}" alt="点击这里给我发消息" width="79" height="25" border="0">
</a></strong></p> -->
<p><strong>邮件：{{ strip_tags(config('webconfig.web_email')) }}</strong></p>
<p><strong>{{ strip_tags(config('webconfig.web_worktime')) }}</strong></p>
            </div>
        </div>
                <div class="a-box wechat">
            <div class="wechat-wrap">
            {!! config('webconfig.web_ewm') !!}
            
                <!-- <img src="{{ asset('static/picture/2019031810053138.png') }}" alt="QR code"> -->
            </div>
        </div>
            <div class="a-box gotop" id="j-top" style="display: none;"></div>
</div>
    <div class="footer-bar">
                    <div class="fb-item">
                <a href="qiyun.html">
                    <i class="fa fa-truck"></i>
                    <span>精准汽运</span>
                </a>
            </div>
                        <div class="fb-item">
                <a href="kongyun.html" target="_blank">
                    <i class="fa fa-plane"></i>
                    <span>精准空运</span>
                </a>
            </div>
                        <div class="fb-item">
                <a href="zhengche.html" target="_blank">
                    <i class="fa fa-archive"></i>
                    <span>整车运输</span>
                </a>
            </div>
                        <div class="fb-item">
                <a href="tel:18911332399" target="_blank">
                    <i class="fa fa-phone-square"></i>
                    <span>咨询电话</span>
                </a>
            </div>
                </div>
<script type='text/javascript'>
/* <![CDATA[ */
var _wpcom_js = {"webp":"","ajaxurl":"https:\/\/www.bjzxwl.com\/wp-admin\/admin-ajax.php","theme_url":"https:\/\/www.bjzxwl.com\/wp-content\/themes\/module","slide_speed":"5000"};
/* ]]> */
</script>
<script type='text/javascript' src='{{ asset("static/js/main-4.3.1.js") }}'></script>
<script type='text/javascript' src='{{ asset("static/js/wp-embed.min-5.3.2.js") }}'></script>
<!-- <script>
(function(){
    var bp = document.createElement('script');
    var curProtocol = window.location.protocol.split(':')[0];
    if (curProtocol === 'https') {
        bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
    }
    else {
        bp.src = 'http://push.zhanzhang.baidu.com/push.js';
    }
    var s = document.getElementsByTagName("script")[0];
    s.parentNode.insertBefore(bp, s);
})();
</script> -->

<!-- 百度统计代码 <script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?a9217ff3b10f7ec759d18ae1b98431a3";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script> -->
    <script>var $imageEl=document.querySelector('meta[property="og:image"]');window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":["mshare","tsina","weixin","qzone","sqq","douban","fbook","twi","bdhome","tqq","tieba","mail","youdao","print"],"bdPic":$imageEl?$imageEl.getAttribute('content'):"","bdStyle":"1","bdSize":"16"},"share":[{"tag" : "single", "bdSize" : 16}, {"tag" : "global","bdSize" : 16,bdPopupOffsetLeft:-227}],url:_wpcom_js.theme_url};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src=_wpcom_js.theme_url + '/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
    @stack('scripts')
</body>
</html>