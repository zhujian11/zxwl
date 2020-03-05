@extends('home.layouts.app')
@section('content')
    <section class="section wpcom-modules modules-service container" id="modules-1" style="margin-top: 20px;margin-bottom: 20px;">
        <div class="row">
            <ul class="service-list">
                  @if(count($fuwus)>0)
                     @foreach($fuwus as $fuwu)              
                        <li class="service-item col-xs-6 col-sm-3 col-md-3 text-center">
                        <a href="{{ route('fuwuDetail',$fuwu->fuwu_id) }}" target="_blank"><img src="{{ asset($fuwu->fuwu_img) }}" alt="{{ $fuwu->fuwu_name }}"></a>
                        <h3 class="service-item-title"><a href="{{ route('fuwuDetail',$fuwu->fuwu_id) }}" target="_blank">{{ $fuwu->fuwu_name }}</a></h3>
                        <p>{{ $fuwu->fuwu_desc}}</p>                    
                        </li>  
                     @endforeach             
                  @endif                
                        
                                    
            </ul>
        </div>
    </section>
    @component('home.component.picture')
    @endcomponent
@endsection
@push('scripts')
    <script>
           function load(){
              $('title').text('产品与服务-{{ strip_tags(config("webconfig.web_seo_title")) }}');
              $('meta[name="keywords"]').attr('content','产品与服务');
              $('meta[name="description"]').attr('content','产品与服务');
           }
    
    </script>
@endpush