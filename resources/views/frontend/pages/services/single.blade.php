@extends('frontend.layouts.seo_master')
@section('css')
    <style>

    .custom-editor .media{
        display: block;
    }

    .custom-editor{
        font-size: 1.1875rem;
    }
    .canosoft-listing ul,.canosoft-listing ol {
        padding: 0;
        margin-left: 15px;
    }
		.home-one a.active {
		color: #fc653c !important;
	}

    </style>
@endsection
@section('seo')
    <title>{{ucfirst(@$singleService->title)}} | {{ucwords(@$setting_data->website_name ?? 'Careerlink')}}   </title>
    <meta name='description' itemprop='description'  content='{{ucfirst(@$singleService->meta_description)}}' />
    <meta name='keywords' content='{{ucfirst(@$singleService->meta_tags)}}' />
    <meta property='article:published_time' content='{{@$singleService->updated_at ?? @$singleService->created_at}}' />
    <meta property='article:section' content='article' />
    <meta property="og:description" content="{{ucfirst(@$singleService->meta_description)}}" />
    <meta property="og:title" content="{{ucfirst(@$singleService->meta_title)}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="Coperation" />
    <meta property="og:locale" content="en-us" />
    <meta property="og:locale:alternate"  content="en-us" />
    <meta property="og:site_name" content="{{ucwords(@$setting_data->website_name ?? 'Careerlink')}} " />
    <meta property="og:image" content="{{asset('/images/service/'.@$singleService->banner_image)}}" />
    <meta property="og:image:url" content="{{asset('/images/service/'.@$singleService->banner_image)}}" />
    <meta property="og:image:size" content="300" />
@endsection

@section('content')

    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">Service Details</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="/">Home</a>
                        <span> / </span>
                        <a href="{{route('service.frontend')}}" style="padding-left: 5px">Service</a>
                        <span> / </span>
                        <a href="#" class="active">{{@$singleService->title}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-service-details-area rts-section-gap service-two-bg bg_image">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-md-12 col-sm-12 col-12">
                    <!-- service details left area start -->
                    <div class="service-detials-step-1">
                        <div class="thumbnail">
                            <img class="lazy" data-src="{{asset('/images/service/'.@$singleService->banner_image)}}" alt="">
                        </div>
                        <h4 class="title">{{ucwords(@$singleService->title)}}</h4>
                        <div class="disc custom-description">
                            {!! $singleService->description !!}
                        </div>
                        <div class="details-share">
                            <h6>Share:</h6>
                            <a><i class="fab fa-facebook-f" onclick='fbShare("{{route('service.single',$singleService->slug)}}")'></i></a>
                            <a><i class="fab fa-twitter" onclick='twitShare("{{route('service.single',$singleService->slug)}}","{{ $singleService->title }}")'></i></a>
                            <a><i class="fab fa-whatsapp" onclick='whatsappShare("{{route('service.single',$singleService->slug)}}","{{ $singleService->title }}")'></i></a>
                        </div>
                    </div>
                </div>
                <!--rts blog wizered area -->
                <div class="col-xl-4 col-md-12 col-sm-12 col-12 mt_lg--60 pl--50 pl_md--0 pl-lg-controler pl_sm--0">
                    @include('frontend.pages.services.sidebar')
                </div>
                <!-- rts- blog wizered end area -->
            </div>
        </div>
    </div>
@endsection
@section('js')
<script>
    function fbShare(url) {
      window.open("https://www.facebook.com/sharer/sharer.php?u=" + url, "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
    }
    function twitShare(url, title) {
        window.open("https://twitter.com/intent/tweet?text=" + encodeURIComponent(title) + "+" + url + "", "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
    }
    function whatsappShare(url, title) {
        message = title + " " + url;
        window.open("https://api.whatsapp.com/send?text=" + message);
    }
    $( document ).ready(function() {
        let selector = $('.custom-description').find('table').length;
        if(selector>0){
            $('.custom-description').find('table').addClass('table table-bordered');
        }
    });
</script>
@endsection
