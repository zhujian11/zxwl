<div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">内容</label>
                        <div class="layui-input-block">
                            <div id="editor1" style="border: 1px solid #ccc;"></div>
                            <div id="editor2" style="height: 600px;border: 1px solid #ccc;"></div>
                            <textarea id="content" name="content" class="layui-textarea" style="width:100%;height:200px;"></textarea>
                            <script src="{{ asset('wangEditor-3.1.1/release/wangEditor.min.js') }}"></script>
                            <script>
                                  var E = window.wangEditor
                                  var editor = new E('#editor1','#editor2')
                                  var $content = $('#content')
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
                                  $content.val(editor.txt.html())
                            </script>
                        </div>
                  </div>