<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.2</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
            
            <a href="{{ route('carousel.index') }}">轮播图列表</a>
            
          </span>
          <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            
                            <button class="layui-btn" onclick="xadmin.open('添加轮播','{{ route("carousel.create") }}','','',true)"><i class="layui-icon"></i>添加</button>
                            <div style="float:right;line-height:43px;height:43px;">共 {{ $cars->total() }} 条</div>
                            <div styel="clear:both;"></div>
                        </div>
                        <div class="layui-card-body ">
                            <table class="layui-table layui-form" lay-filter="fuwulist">
                              <thead>
                                <tr>
                                  <!-- <th>
                                    <input type="checkbox" name="" class="checkAll" lay-skin="primary">
                                  </th> -->
                                  <th>ID</th>
                                  
                                  <th>轮播图</th>
                                  <th>是否启用</th>
                                  <th>创建时间</th>
                                  
                                  <th>操作</th>
                              </thead>
                              <tbody>
                                @if(count($cars)>0)
                                     @foreach($cars as $k=>$v)
                                            <tr>
                                              <!-- <td>
                                                <input type="checkbox" name="" class="checkOne" lay-skin="primary">
                                              </td> -->
                                              <td>{{ $v->carousel_id }}</td>
                                              
                                              <td>
                                                  @if(!empty($v->carousel_img))
                                                     <img src="{{ asset($v->carousel_img) }}" alt="">
                                                  @endif
                                              </td>
                                              <td>
                                                  
                                                <input type="checkbox" value="{{$v->carousel_id}}" name="switch" lay-skin="switch" lay-text="ON|OFF" lay-filter="switchTest" {{ $v->carousel_status==1 ? 'checked' : '' }}>
                                                  
                                              </td>
                                              <td>{{ $v->created_at }}</td>
                                              
                                              <td class="td-manage">
                                                
                                                
                                                <a title="删除" onclick="member_del(this,'{{ $v->carousel_id }}')" href="javascript:;">
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
                                   {{ $cars->links() }}
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
       
        form.on('switch(switchTest)',function(data){
            if(data.elem.checked==true){
                var num = 1;
            }else{
                var num = 0;
            }
            $.ajax({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      url: '/admin/carousel/'+data.elem.value,
                      type: 'put',
                      dataType: 'json',
                      data: {num:num},
                      success: function(data){
                        if(data.status==200){
                            layer.msg(data.message,{icon:6,time:1000});
                        }else{
                            layer.msg(data.message,{icon:5,time:1000});
                        }
                      }
                    });
        });
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
                url: '/admin/carousel/'+id,
                data: {_method: 'delete',_token:'{{ csrf_token() }}'},
                type: 'post',
                dataType: 'json',
                success: function(data){
                  if(data.code==200){
                    $(obj).parents("tr").remove();
                    layer.msg(data.message,{icon:1,time:1000});
                  }else{
                    layer.msg(data.message,{icon:5,time:1000});
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
    
    
</html>