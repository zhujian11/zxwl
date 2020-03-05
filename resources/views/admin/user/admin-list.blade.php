<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.2</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        @include('admin.common.style')
        @include('admin.common.script')
        <!--[if lt IE 9]>
          <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
          <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="x-nav">
          <span class="layui-breadcrumb">
            <a href="{{ route('user.index') }}">管理员列表</a>
            
          </span>
          <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body " style="height:30px;">
                            <form style="width:80%;float:left;" class="layui-form layui-col-space5" method="get" action="{{ route('searchUser') }}">
                                
                                <div class="layui-inline layui-show-xs-block">
                                    <input type="text" name="username"  placeholder="请输入用户名" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <input type="text" name="email"  placeholder="请输入邮箱" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-inline layui-show-xs-block">
                                    <button class="layui-btn"  lay-submit="" lay-filter="sreach"><i class="layui-icon">&#xe615;</i></button>
                                </div>
                            </form>
                            <div style="float:right;line-height:30px;height:30px;">共 {{ $users->total() }} 条</div>
                            <div styel="clear:both;"></div>
                        </div>
                        <div class="layui-card-header">
                            
                            <button class="layui-btn" onclick="xadmin.open('添加用户','{{ route("user.create") }}',600,400)"><i class="layui-icon"></i>添加</button>
                        </div>
                        <div class="layui-card-body ">
                            <table class="layui-table layui-form">
                              <thead>
                                <tr>
                                  <!-- <th>
                                    <input type="checkbox" name=""  lay-skin="primary">
                                  </th> -->
                                  <th>ID</th>
                                  <th>登录名</th>
                                  
                                  <th>邮箱</th>
                                  
                                  <th>加入时间</th>
                                  
                                  <th>操作</th>
                              </thead>
                              <tbody>
                                @if(count($users)>0)
                                     @foreach($users as $k=>$v)
                                            <tr>
                                              <!-- <td>
                                                <input type="checkbox" name=""  lay-skin="primary">
                                              </td> -->
                                              <td>{{ $k+1 }}</td>
                                              <td>{{ $v->user_name }}</td>
                                              
                                              <td>{{ $v->user_email }}</td>
                                             
                                              <td>{{ $v->created_at }}</td>
                                              
                                              <td class="td-manage">
                                                
                                                <a title="编辑"  onclick="xadmin.open('编辑','{{ route("user.edit",$v->user_id) }}',600,400)" href="javascript:;">
                                                  <i class="layui-icon">&#xe642;</i>
                                                </a>
                                                <a title="删除" onclick="member_del(this,'{{ $v->user_id }}')" href="javascript:;">
                                                  <i class="layui-icon">&#xe640;</i>
                                                </a>
                                              </td>
                                            </tr>
                                     @endforeach
                                
                                @endif
                              </tbody>
                            </table>
                        </div>
                        <div class="layui-card-body ">
                            <div class="page">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </body>
    <script>
      layui.use(['laydate','form'], function(){
        var laydate = layui.laydate;
        var form = layui.form;
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });
      });

      

      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $.ajax({
                url: '/admin/user/'+id,
                type: 'post',
                data: {_method: 'delete',_token:'{{ csrf_token() }}'},
                success: function(data){
                  if(data.code==200){
                    $(obj).parents("tr").remove();
                    layer.msg(data.message,{icon:6,time:1000});
                  }else{
                    lay.msg(data.message,{icon:5,time:1000});
                  }
                }
              });
              
          });
      }



      function delAll (argument) {

        var data = tableCheck.getData();
  
        layer.confirm('确认要删除吗？'+data,function(index){
            //捉到所有被选中的，发异步进行删除
            layer.msg('删除成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
        });
      }
    </script>
    <script>var _hmt = _hmt || []; (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
      })();</script>
</html>