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
                  <div class="layui-form-item">
                      <label class="layui-form-label">
                          <span class="x-red">*</span>标题
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" name="config_title" lay-verify="required"
                          autocomplete="off" class="layui-input">
                      </div>
                     
                  </div>
                  
                  <div class="layui-form-item">
                      <label  class="layui-form-label">
                          <span class="x-red">*</span>变量名
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" name="config_name" lay-verify="configname" autocomplete="off" class="layui-input">
                          
                      </div>
                      
                  </div>

                 

                  @component('admin.component.editor')
                  @endcomponent

                 
                  
                  
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

                //自定义验证规则
                form.verify({
                    configname: function(value) {
                        if (value.trim() == "") {
                            return '变量名不能为空';
                        }
                        var param = {name:value}
                        var checkResult = "";
                        $.ajax({
                          url:'{{ route("onlyConfigName") }}',
                          type:'get',
                          data:param,
                          async:false,
                          success:function(res){
                            if(res==1){
                              checkResult = '变量名已存在';
                            }
                          }
                        });
                        return checkResult;
                    }
                });

                //监听提交
                form.on('submit(add)',
                function(data) {
                    
                    //发异步，把数据提交给php
                    $.ajax({
                      headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                      url: '{{ route("config.store") }}',
                      type: 'post',
                      dataType: 'json',
                      data: data.field,
                      success: function(data){
                        if(data.status==200){
                          layer.alert(data.message, {
                              icon: 6
                          },function() {
                              xadmin.close();
                              xadmin.father_reload();
                              
                          })
                        }else{
                          layer.alert(data.message, {
                              icon: 5
                          },function(){
                            
                          })
                        }
                      }
                    });
                    
                  
                    return false;
                });

            });</script>
            
            
        
    </body>

</html>
