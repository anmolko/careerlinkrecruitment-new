@extends('frontend.layouts.master')
@section('title')  {{ucwords(@$singleSlider->list_header)}} @endsection
@section('css')
@endsection


@section('content')

    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">Page list Details</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="/">Home</a>
                        <span> / </span>
                        <a href="{{route('service.frontend')}}" style="padding-left: 5px">Service</a>
                        <span> / </span>
                        <a href="#" class="active">{{ucwords(@$singleSlider->list_header)}}</a>
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
                            <img class="lazy" data-src="{{ asset('/images/section_elements/list_1/'.$singleSlider->list_image) }}" alt="">
                        </div>
                        <h4 class="title">    {!! @$singleSlider->list_description !!}</h4>
                        <div class="disc custom-description">
                            {!! @$singleSlider->list_description !!}
                        </div>
                    </div>
                </div>
                <!--rts blog wizered area -->
                <div class="col-xl-4 col-md-12 col-sm-12 col-12 mt_lg--60 pl--50 pl_md--0 pl-lg-controler pl_sm--0">
                    @include('frontend.pages.sliderlist.sidebar')
                </div>
                <!-- rts- blog wizered end area -->
            </div>
        </div>
    </div>
@endsection
