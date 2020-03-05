@extends('home.layouts.app')
@section('content')
<section class="section wpcom-modules modules-image-gird container" id="modules-7" style="margin-top: 20px;margin-bottom: 20px;">
          {!! $fuwu->fuwu_content !!}      
</section>
                
    @component('home.component.picture')
    @endcomponent
@endsection

@push('scripts')
    <script>
           function load(){
              $('title').text('{{ $fuwu->seo_title }}-{{ strip_tags(config("webconfig.web_seo_title")) }}');
              $('meta[name="keywords"]').attr('content','{{ $fuwu->seo_keywords }}');
              $('meta[name="description"]').attr('content','{{ $fuwu->seo_description }}');
           }
    
    </script>
@endpush