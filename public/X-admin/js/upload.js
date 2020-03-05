layui.use('upload', function(){
    var upload = layui.upload;
    var type = $('#type').val();
    var _token = $('meta[name="csrf-token"]').attr('content');
    //执行实例
    var uploadInst = upload.render({
        elem: '#image' //绑定元素
        ,url: '/admin/upload' //上传接口
        ,headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
        ,data: {_token: _token,type: type}
        ,done: function(res){
              if(res.code==200){
                  $("#uploaded_img").attr('src','/uploads/'+res.message);
                  $('input[name="uploaded_url"]').val('/uploads/'+res.message);
              }
              if(res.code==400 || res.code==500){
                  layer.alert(res.message,{icon:5});
              }
        }
        ,accept:'images'
        ,size:1024*2
        ,error: function(){
        //请求异常回调
        }
    });
    });