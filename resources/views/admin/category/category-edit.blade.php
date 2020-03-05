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

                  <input type="hidden" id="catename" value="{{ $cate->category_name }}">


                  <div class="layui-form-item">
                      <label class="layui-form-label">
                          <span class="x-red">*</span>栏目名称
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" name="catename" lay-verify="catename"
                          autocomplete="off" class="layui-input" value="{{ $cate->category_name }}">
                      </div>
                     
                  </div>
                  
                  <div class="layui-form-item">
                        <label class="layui-form-label">父级栏目</label>
                        <div class="layui-input-block">
                            <select name="category_pid" lay-verify="required">
                                <option value="">请选择</option>
                                <option value="0" {{$cate->category_pid=='0' ? 'selected' : ''}}>无</option>
                                @if(count($topcates)>0)
                                @foreach($topcates as $v)
                                <option value="{{ $v->category_id }}" {{$cate->category_pid == $v->category_id ? 'selected' : ''}}>{{ $v->category_name }}</option>
                                @endforeach
                                @endif
                            </select>


                        </div>
                   </div>

                  

                  <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">内容</label>
                        <div class="layui-input-block">
                            <input type="hidden" id="content1" value="{{ $cate->category_content }}">
                            <div id="editor1" style="border: 1px solid #ccc;"></div>
                            <div id="editor2" style="height: 600px;border: 1px solid #ccc;"></div>
                            <textarea id="content" name="content" class="layui-textarea" style="width:100%;height:200px;"></textarea>
                            <script src="{{ asset('wangEditor-3.1.1/release/wangEditor.min.js') }}"></script>
                            <script>
                                  var E = window.wangEditor
                                  var editor = new E('#editor1','#editor2')
                                  var $content = $('#content')
                                  var info = $('#content1').val()
                                  editor.customConfig.onchange = function (html) {
                                        // 监控变化，同步更新到 textarea
                                        $content.val(html)
                                  }
                                  editor.customConfig.uploadImgServer = '{{ route("uploads") }}'
                                  editor.customConfig.uploadImgParams = {
                                        
                                        _token: '{{ csrf_token() }}'
                            
                                  }
                                  editor.customConfig.uploadFileName = "myfile[]"
                                  editor.customConfig.zIndex = 100
                                  editor.create()

                                  editor.txt.html(info)
                                  $content.val(editor.txt.html())
                            </script>
                        </div>
                  </div>

                  <div class="layui-form-item">
                      <label class="layui-form-label">
                          seo_title
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" name="seo_title" autocomplete="off" class="layui-input" value="{{ $cate->seo_title }}">
                          
                      </div>
                      
                  </div>
                  <div class="layui-form-item">
                      <label class="layui-form-label">
                          seo_keywords
                      </label>
                      <div class="layui-input-inline">
                          <input type="text" name="seo_keywords" autocomplete="off" class="layui-input" value="{{ $cate->seo_keywords }}">
                          
                      </div>
                      
                  </div>
                  <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">seo_content</label>
                        <div class="layui-input-block">
                            <textarea name="seo_content" placeholder="请输入内容" class="layui-textarea">{{ $cate->seo_description }}</textarea>
                        </div>
                  </div>
                  
                  
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
                    catename: function(value) {
                        if (value.trim() == "") {
                            return '栏目名称不能为空';
                        }
                        var originname = $('#catename').val();
                        var param = {name:value,originname:originname}
                        var checkResult = "";
                        $.ajax({
                          url:'{{ route("onlyEditCateName") }}',
                          type:'get',
                          data:param,
                          async:false,
                          success:function(res){
                            if(res==1){
                              checkResult = '栏目名称已存在';
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
                      url: '{{ route("category.update",$cate->category_id) }}',
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
