<!doctype html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>后台登录-X-admin2.2 {{ strip_tags(config('webconfig.web_mobile')) }}</title>
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <meta http-equiv="Cache-Control" content="no-siteapp" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('admin.common.style')
        @include('admin.common.script')
        
    </head>
    <body class="index">
        <!-- 顶部开始 -->

        @include('admin.common.header')
        
        <!-- 顶部结束 -->

        <!-- 中部开始 -->

        <!-- 左侧菜单开始 -->


        @include('admin.common.menu')
        
        <!-- <div class="x-slide_left"></div> -->
        <!-- 左侧菜单结束 -->


        <!-- 右侧主体开始 -->
        <div class="page-content">
            @yield('content')
        </div>
        <div class="page-content-bg"></div>
        <style id="theme_style"></style>
        <!-- 右侧主体结束 -->

        <!-- 中部结束 -->
        
    </body>

</html>