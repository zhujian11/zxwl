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
                      <label for="username" class="layui-form-label">
                          <span class="x-red">*</span>登录名
                      </label>
                      <div class="layui-input-inline">
                          <input type="hidden" id="uname" value="{{ $user->user_name }}">
                          <input type="text" id="username" name="username" lay-verify="username"
                          autocomplete="off" class="layui-input" value="{{ $user->user_name }}">
                      </div>
                      <div class="layui-form-mid layui-word-aux">
                          <span class="x-red">*</span>将会成为您唯一的登入名
                      </div>
                  </div>
                  <!-- <div class="layui-form-item">
                      <label for="phone" class="layui-form-label">
                          <span class="x-red">*</span>手机
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" id="phone" name="phone" required="" lay-verify="phone"
                          autocomplete="off" class="layui-input">
                      </div>
                      <div class="layui-form-mid layui-word-aux">
                          <span class="x-red">*</span>将会成为您唯一的登入名
                      </div>
                  </div> -->
                  <div class="layui-form-item">
                      <label for="L_email" class="layui-form-label">
                          <span class="x-red">*</span>邮箱
                      </label>
                      <div class="layui-input-inline">
                          <input type="hidden" id="uemail" value="{{ $user->user_email }}">
                          <input type="text" id="L_email" name="email" lay-verify="useremail"
                          autocomplete="off" class="layui-input" value="{{ $user->user_email }}">
                      </div>
                      <div class="layui-form-mid layui-word-aux">
                          <span class="x-red">*</span>
                      </div>
                  </div>
                  <!-- <div class="layui-form-item">
                      <label class="layui-form-label"><span class="x-red">*</span>角色</label>
                      <div class="layui-input-block">
                        <input type="checkbox" name="like1[write]" lay-skin="primary" title="超级管理员" checked="">
                        <input type="checkbox" name="like1[read]" lay-skin="primary" title="编辑人员">
                        <input type="checkbox" name="like1[write]" lay-skin="primary" title="宣传人员" checked="">
                      </div>
                  </div> -->
                  
                  
                  <div class="layui-form-item">
                      <label for="L_repass" class="layui-form-label">
                      </label>
                      <button  class="layui-btn" lay-filter="add" lay-submit="">
                          编辑
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
                    username: function(value) {
                        if (value.trim() == "") {
                            return '登录名不能为空';
                        }
                        var originname = $('#uname').val();
                        var param = {name:value,originname:originname}
                        var checkResult = "";
                        $.ajax({
                          url:'{{ route("onlyEditUserName") }}',
                          type:'get',
                          data:param,
                          async:false,
                          success:function(res){
                            if(res==1){
                              checkResult = '登录名已存在';
                            }
                          }
                        });
                        return checkResult;
                    },
                    useremail: function(value){
                        if(! new RegExp("^[a-z0-9._%-]+@([a-z0-9-]+\.)+[a-z]{2,4}$|^1[3|4|5|7|8]\d{9}$").test(value)){
                           return "邮箱格式错误";
                        }
                        var originemail = $('#uemail').val();
                        var param = {email:value,originemail:originemail}
                        var checkResult = "";
                        $.ajax({
                          url:'{{ route("onlyEditUserEmail") }}',
                          type:'get',
                          data:param,
                          async:false,
                          success:function(res){
                            if(res==1){
                              checkResult = '邮箱已存在';
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
                      url: '{{ route("user.update",$user->user_id) }}',
                      type: 'put',
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
                              xadmin.close();
                          })
                        }
                      }
                    });
                    
                  
                    return false;
                });

            });</script>
        
    </body>

</html>
