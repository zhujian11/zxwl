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
        <!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
        <!--[if lt IE 9]>
            <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
            <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form">
                  @csrf
                  
                  
                  

                  @component('admin.component.upload',['type'=>'carousel'])
                  @endcomponent

                  <div class="layui-form-item">
                        <label class="layui-form-label">是否启用</label>
                        <div class="layui-input-block" style="padding-top:6px;">
                            <input type="checkbox" name="switch" lay-skin="switch" lay-text="ON|OFF" lay-filter="switchTest" value="1">
                            
                        </div>
                  </div>
                  
                  
                  <div class="layui-form-item">
                      <label for="L_repass" class="layui-form-label">
                      </label>
                      <button  class="layui-btn" lay-filter="add" lay-submit="">
                          增加
                      </button>
                  </div>
              </form>
            </div>
        </div>
        <script>layui.use(['form', 'layer'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;


                //监听提交
                form.on('submit(add)',
                function(data) {
                    var car = $('input[name="uploaded_url"]').val();
                    if(car.trim()==""){
                        layer.msg('图片不能为空', {
                                        icon: 5,time:1000
                                    },function(){
                                        
                        });
                    }else{
                        //发异步，把数据提交给php
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: '{{ route("carousel.store") }}',
                            type: 'post',
                            dataType: 'json',
                            data: data.field,
                            success: function(data){
                                if(data.status==200){
                                    layer.alert(data.message, {
                                        icon: 6
                                    },function() {
                                        
                                        parent.location.reload();
                                        
                                    })
                                }else{
                                    layer.alert(data.message, {
                                        icon: 5
                                    },function(){
                                        
                                    })
                                }
                            }
                        });

                    }
                    
                    
                  
                    return false;
                });

            });</script>
            <script src="{{ asset('X-admin/js/upload.js') }}"></script>
            
        
    </body>

</html>
