<div class="layui-form-item">
                      @if($type=='carousel')
                      <label  class="layui-form-label">
                          轮播图
                      </label>
                      @else
                      <label  class="layui-form-label">
                          封面
                      </label>
                      @endif
                      <div class="layui-input-inline">
                            <input type="hidden" name="type" id="type" value="{{ $type }}">
                            <input type="hidden" name="uploaded_url" value="">
                            <button type="button" class="layui-btn" id="image">
                                <i class="layui-icon">&#xe67c;</i>上传图片
                            </button>
                            <img id="uploaded_img" src="" alt="" style="margin-top:15px;">
                      </div>
                      <div class="layui-form-mid layui-word-aux">
                          <span class="x-red">*</span>图片大小不能超过2M
                      </div>
                  </div>

            
