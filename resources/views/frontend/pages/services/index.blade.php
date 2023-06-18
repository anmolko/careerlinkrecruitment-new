@extends('frontend.layouts.master')
@section('title') Services @endsection
@section('css')
    <style>

    .corpkit-content > .corpkit-content-inner {
        padding-top: 0;
        padding-bottom: 0;
    }
</style>
@endsection
@section('content')

    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">Service List</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="/">Home</a>
                        <span> / </span>
                        <a href="#" class="active">Our Service</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-service-area rts-section-gapTop pb--200 service-two-bg bg_image">
        <div class="container">
            <div class="row g-5 service padding-controler">
                <div class="col-xl-8 col-md-12 col-sm-12 col-12">
                    <div class="row g-5">
                        @foreach(@$allservices as $index=>$service)
                            <div class="col-xl-6 col-md-6 col-sm-12 col-12 pb--140 pb_md--100">
                                <div class="service-two-inner">
                                    <a href="{{route('service.single',$service->slug)}}" class="thumbnail">
                                        <img class="lazy" data-src="{{asset('/images/service/thumb/thumb_'.@$service->banner_image)}}" alt="" /></a>
                                    <div class="body-content">
                                        <div class="hidden-area">
                                            <h5 class="title">{{ucwords(@$service->title)}}</h5>
                                            <p class="dsic">
                                                {{ elipsis(strip_tags($service->description))}}
                                            </p>
                                            <a class="rts-read-more-two color-primary" href="{{route('service.single',$service->slug)}}">Read More <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-4 col-md-12 col-sm-12 col-12">
                    @include('frontend.pages.services.sidebar')
                </div>
            </div>
        </div>
    </div>

@endsection
