<div class="left-nav">
            <div id="side-nav">
                <ul id="nav">
                    

                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="产品与服务管理">&#xe723;</i>
                            <cite>产品与服务管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('服务列表','{{ route("fuwu.index") }}',true)">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>服务列表</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('添加服务','{{ route("fuwu.create") }}',true)">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>添加服务</cite></a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="专题与栏目管理">&#xe723;</i>
                            <cite>专题与栏目管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('栏目列表','{{ route("category.index") }}',true)">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>栏目列表</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('添加栏目','{{ route("category.create") }}',true)">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>添加栏目</cite></a>
                            </li>
                            
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="新闻资讯管理">&#xe723;</i>
                            <cite>新闻资讯管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('新闻列表','{{ route("news.index") }}',true)">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>新闻列表</cite></a>
                            </li>
                            <li>
                                <a onclick="xadmin.add_tab('添加新闻','{{ route("news.create") }}',true)">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>添加新闻</cite></a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="管理员管理">&#xe726;</i>
                            <cite>管理员管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('管理员列表','{{ route("user.index") }}',true)">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>管理员列表</cite></a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="网站配置管理">&#xe726;</i>
                            <cite>网站配置管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('网站配置列表','{{ route("config.index") }}',true)">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>网站配置列表</cite></a>
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="iconfont left-nav-li" lay-tips="轮播图管理">&#xe726;</i>
                            <cite>轮播图管理</cite>
                            <i class="iconfont nav_right">&#xe697;</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a onclick="xadmin.add_tab('轮播图列表','{{ route("carousel.index") }}',true)">
                                    <i class="iconfont">&#xe6a7;</i>
                                    <cite>轮播图列表</cite></a>
                            </li>
                            
                        </ul>
                    </li>

                    
                </ul>
            </div>
        </div>