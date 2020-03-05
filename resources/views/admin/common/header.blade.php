<div class="container">
            <div class="logo">
                <a href="{{ url('admin/index') }}">X-admin v2.2</a></div>
            <div class="left_open">
                <a><i title="展开左侧栏" class="iconfont">&#xe699;</i></a>
            </div>
            
            <ul class="layui-nav right" lay-filter="">
                <li class="layui-nav-item">
                    
                    <a href="javascript:;">{{ session('user')->user_name }}</a>
                    <dl class="layui-nav-child">
                        <!-- 二级菜单 -->
                        
                        <dd>
                            <a onclick="xadmin.open('修改密码','{{ route("passreset",session('user')->user_id) }}',600,400)">修改密码</a></dd>
                        <dd>
                            <a href="{{ route('loginOut') }}">退出</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item to-index">
                    <a href="/">前台首页</a></li>
            </ul>
        </div>