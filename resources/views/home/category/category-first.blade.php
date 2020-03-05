@extends('home.layouts.app')
@section("content")
      <section class="section wpcom-modules modules-fullwidth j-modules-wrap" id="modules-8" style="margin-top: ;margin-bottom: ;padding-top: ;padding-bottom: ;background-image: url(/static/image/1483936415.jpg);">
                <div class="j-modules-inner container-fluid">
                    <section class="section wpcom-modules modules-text" id="modules-9" style="margin-top: 30px;margin-bottom: 30px;">
                        <p style="text-align: center;"><span style="color: #ffffff; font-size: 28px;"><strong>北京魔豆物流有限公司-{{ $cate->category_name }}</strong></span></p>
                    </section>
                </div>
       </section>
        <section class="section wpcom-modules modules-text container" id="modules-2" style="margin-top: 20px;margin-bottom: 20px;">
            {!! $cate->category_content !!}
        </section>
                
@endsection
@push('scripts')
    <script>
           function load(){
              $('title').text('{{ $cate->seo_title }}-{{ strip_tags(config("webconfig.web_seo_title")) }}');
              $('meta[name="keywords"]').attr('content','{{ $cate->seo_keywords }}');
              $('meta[name="description"]').attr('content','{{ $cate->seo_description }}');
           }
    
    </script>
@endpush