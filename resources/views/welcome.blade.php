@extends('frontend.layouts.master')
@section('title') Home @endsection
@section('css')

@endsection
@section('content')

    @if(count($sliders) > 0)
        <div id="rs-slider" class="rs-slider slider3 rs-slider-style4 relative">
            <div class="bend niceties">
                <div id="nivoSlider" class="slides">
                    @foreach(@$sliders as $index=>$slider)
                        <img src="{{ asset('/images/sliders/'.$slider->image) }}" alt="" title="#slide-{{$index+1}}" />
                    @endforeach
                </div>
                @foreach(@$sliders as $index=>$slider)
                    <div id="slide-{{$index+1}}" class="slider-direction">
                        <div class="content-part text-center">
                            <div class="container">
                                <div class="slider-des">
                                    <div class="sl-subtitle">{{@$slider->subheading ?? ''}}</div>
                                    <h1 class="sl-title">{{@$slider->heading ?? ''}}</h1>
                                </div>
                                @if(@$slider->link)
                                    <ul class="slider-bottom">
                                        <li><a class="readon consultant orange-slide" href="{{@$slider->link ?? ''}}">{{@$slider->button ?? 'Start Exploring'}}</a></li>
                                    </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    @if($homepage_info->mission)
        <div id="rs-services" class="rs-services style4 pt-95 pb-100 md-pt-65 md-pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 md-mb-30">
                        <div class="services-item">
                            <div class="services-icon">
                                <img class="dance_hover" src="{{ asset('assets/frontend/images/services/mission.png') }}" alt="">
                            </div>
                            <div class="services-content">
                                <h3 class="title"><a> Our Mission</a></h3>
                                <p class="margin-0">
                                    {{ ucfirst(@$homepage_info->mission) }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 md-mb-30">
                        <div class="services-item">
                            <div class="services-icon">
                                <img class="dance_hover" src="{{asset('assets/frontend/images/services/vision.png')}}" alt="">
                            </div>
                            <div class="services-content">
                                <h3 class="title"><a>Our Vision</a></h3>
                                <p class="margin-0"> {{ ucfirst(@$homepage_info->vision) }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="services-item">
                            <div class="services-icon">
                                <img class="dance_hover" src="{{ asset('assets/frontend/images/services/benefits.png') }}" alt="">
                            </div>
                            <div class="services-content">
                                <h3 class="title"><a>Our Value</a></h3>
                                <p class="margin-0">{{ ucfirst(@$homepage_info->value) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(!empty($homepage_info->welcome_description))
        <div class="rs-about style1 pt-10 pb-40 md-pt-70 md-pb-70">
            <div class="container">
                <div class="row y-middle">
                    <div class="col-lg-6 pr-70 md-pr-15 md-mb-50">
                        <div class="sec-title2 mb-30">
                            <div class="sub-text">{{$homepage_info->welcome_subheading ?? ''}}</div>
                            <h2 class="title mb-23">
                                <?php
                                $split = explode(" ", @$homepage_info->welcome_heading);?> {{preg_replace('/\W\w+\s*(\W*)$/', '$1', @$homepage_info->welcome_heading)."\n"}}
                                <span> {{$split[count($split)-1]}} </span>
                            </h2>
                            <p class="desc mb-0 text-justify"> {{ ucfirst(@$homepage_info->welcome_description) }}</p>
                        </div>
                        @if(@$homepage_info->welcome_link)
                            <div class="btn-part">
                                <a class="readon consultant discover" href="{{@$homepage_info->welcome_link}}">
                                    {{ @$homepage_info->welcome_button }}
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        <div class="rs-videos choose-video">
                            <div class="images-video">
                                <img class="lazy" data-src="{{ @$homepage_info->welcome_image ? asset('/images/home/welcome/'.@$homepage_info->welcome_image):''}}" alt="images">
                            </div>
                            @if(@$homepage_info->welcome_video_link)
                                <div class="animate-border">
                                    <a class="popup-border" href="{{ @$homepage_info->welcome_video_link }}">
                                        <i class="fa fa-play"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if(count($latestServices) > 0)
        <div id="rs-services" class="rs-services style2 gray-bg pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="sec-title2 text-center md-left mb-40">
                <div class="sub-text">What We Offer</div>
                <h2 class="title mb-0 md-pb-20">The best <span> services </span> for your business
                </h2>
            </div>
            <div class="row">
                @foreach(@$latestServices as $index=>$service)
                    <div class="col-md-4 mt-2 mr-14 service-wrap" style="width: 365.5px!important;">
                        <div class="image-part">
                            <img class="lazy" data-src="{{asset('/images/service/thumb/thumb_'.@$service->banner_image)}}" alt="">
                        </div>
                        <div class="content-part">
                            <h3 class="title">
                                <a href="{{route('service.single',$service->slug)}}">
                                    {{ucwords(@$service->title)}}
                                </a>
                            </h3>
                            <div class="desc"> {{ elipsis( strip_tags($service->description) )}}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    @if(!empty($homepage_info->core_main_heading))
        <div class="rs-services style5 bg14 pt-95 pb-100 md-pt-65 md-pb-70">
        <div class="container">
            <div class="sec-title text-center mb-50">
                <span class="sub-text small">{{ucfirst(@$homepage_info->core_main_description)}}</span>
                <h2 class="title title3">
                    {{ucfirst(@$homepage_info->core_main_heading)}}
                </h2>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-25">
                    <div class="flip-box-inner">
                        <div class="flip-box-wrap">
                            <div class="front-part">
                                <div class="front-content-part">
                                    <div class="front-icon-part">
                                        <div class="icon-part">
                                            <img class="lazy" data-src="{{asset('assets/frontend/images/services/trust.png')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="front-title-part">
                                        <h3 class="title"><a>{{ucwords(@$homepage_info->core_heading1 ?? '')}}</a></h3>
                                    </div>
                                    <div class="front-desc-part">
                                        <p>
                                            {{ ucfirst(@$homepage_info->core_description1 ?? '') }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="back-part">
                                <div class="back-front-content">
                                    <div class="back-title-part">
                                        <h3 class="back-title">
                                            <a>{{ucwords(@$homepage_info->core_heading1 ?? '')}}</a>
                                        </h3>
                                    </div>
                                    <div class="back-desc-part">
                                        <p class="back-desc">
                                            {{ucfirst(@$homepage_info->core_description1 ?? '')}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-25">
                    <div class="flip-box-inner">
                        <div class="flip-box-wrap">
                            <div class="front-part">
                                <div class="front-content-part">
                                    <div class="front-icon-part">
                                        <div class="icon-part">
                                            <img class="lazy" data-src="{{asset('assets/frontend/images/services/ethics.png')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="front-title-part">
                                        <h3 class="title"><a>{{ucwords(@$homepage_info->core_heading2)}}</a></h3>
                                    </div>
                                    <div class="front-desc-part">
                                        <p>
{{--                                            #efbc49--}}
                                            {{ucfirst(@$homepage_info->core_description2)}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="back-part">
                                <div class="back-front-content">
                                    <div class="back-title-part">
                                        <h3 class="back-title"><a>{{ucwords(@$homepage_info->core_heading2)}}</a></h3>
                                    </div>
                                    <div class="back-desc-part">
                                        <p class="back-desc">
                                            {{ucfirst(@$homepage_info->core_description2)}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-25">
                    <div class="flip-box-inner">
                        <div class="flip-box-wrap">
                            <div class="front-part">
                                <div class="front-content-part">
                                    <div class="front-icon-part">
                                        <div class="icon-part">
                                            <img class="lazy" data-src="{{asset('assets/frontend/images/services/quality.png')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="front-title-part">
                                        <h3 class="title"><a>{{ucwords(@$homepage_info->core_heading3)}}</a></h3>
                                    </div>
                                    <div class="front-desc-part">
                                        <p>
                                            {{ucfirst(@$homepage_info->core_description3)}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="back-part">
                                <div class="back-front-content">
                                    <div class="back-title-part">
                                        <h3 class="back-title"><a>{{ucwords(@$homepage_info->core_heading3)}}</a></h3>
                                    </div>
                                    <div class="back-desc-part">
                                        <p class="back-desc"> {{ucfirst(@$homepage_info->core_description3)}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 md-mb-25">
                    <div class="flip-box-inner">
                        <div class="flip-box-wrap">
                            <div class="front-part">
                                <div class="front-content-part">
                                    <div class="front-icon-part">
                                        <div class="icon-part">
                                            <img class="lazy" data-src="{{asset('assets/frontend/images/services/integrity.png')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="front-title-part">
                                        <h3 class="title"><a>{{ucwords(@$homepage_info->core_heading4)}}</a></h3>
                                    </div>
                                    <div class="front-desc-part">
                                        <p>
                                            {{ucfirst(@$homepage_info->core_description4)}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="back-part">
                                <div class="back-front-content">
                                    <div class="back-title-part">
                                        <h3 class="back-title"><a>{{ucwords(@$homepage_info->core_heading4)}}</a></h3>
                                    </div>
                                    <div class="back-desc-part">
                                        <p class="back-desc">
                                            {{ucfirst(@$homepage_info->core_description4)}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 sm-mb-25">
                    <div class="flip-box-inner">
                        <div class="flip-box-wrap">
                            <div class="front-part">
                                <div class="front-content-part">
                                    <div class="front-icon-part">
                                        <div class="icon-part">
                                            <img src="{{asset('assets/frontend/images/services/professional.png')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="front-title-part">
                                        <h3 class="title"><a>{{ucwords(@$homepage_info->core_heading5)}}</a></h3>
                                    </div>
                                    <div class="front-desc-part">
                                        <p>
                                            {{  elipsis(ucfirst(@$homepage_info->core_description5)) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="back-part">
                                <div class="back-front-content">
                                    <div class="back-title-part">
                                        <h3 class="back-title"><a>{{ucwords(@$homepage_info->core_heading5)}}</a></h3>
                                    </div>
                                    <div class="back-desc-part">
                                        <p class="back-desc">
                                            {{ucfirst(@$homepage_info->core_description5)}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="flip-box-inner">
                        <div class="flip-box-wrap">
                            <div class="front-part">
                                <div class="front-content-part">
                                    <div class="front-icon-part">
                                        <div class="icon-part">
                                            <img class="lazy" data-src="{{asset('assets/frontend/images/services/target.png')}}" alt="">
                                        </div>
                                    </div>
                                    <div class="front-title-part">
                                        <h3 class="title"><a>{{ucwords(@$homepage_info->core_heading6)}}</a></h3>
                                    </div>
                                    <div class="front-desc-part">
                                        <p>
                                            {{  elipsis(ucfirst(@$homepage_info->core_description6)) }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="back-part">
                                <div class="back-front-content">
                                    <div class="back-title-part">
                                        <h3 class="back-title"><a>{{ucwords(@$homepage_info->core_heading6)}}</a></h3>
                                    </div>
                                    <div class="back-desc-part">
                                        <p class="back-desc">
                                            {{ucfirst(@$homepage_info->core_description6)}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="rs-process style1 bg2 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="sec-title2 white-color text-center md-left mb-40">
                <div class="sub-text">Working Process</div>
                <h2 class="title">How we work for our valued <br><span>customers.</span></h2>
            </div>
        </div>
        <div class="container custom2">
            <div class="process-effects-layer">
                <div class="row">
                    <div class="col-lg-3 col-md-6 md-mb-30">
                        <div class="rs-addon-number">
                            <div class="number-part">
                                <div class="number-image">
                                    <img src="assets/images/process/style1/1.png" alt="Process">
                                </div>
                                <div class="number-text">
                                    <div class="number-area"> <span class="number-prefix"> 1 </span></div>
                                    <div class="number-title">
                                        <h3 class="title"> Discovery</h3>
                                    </div>
                                    <div class="number-txt">
                                        Quisque placerat vitae focus scelerisque. Fusce luctus odio ac nibh luctus,
                                        in porttitor.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 md-mb-30">
                        <div class="rs-addon-number">
                            <div class="number-part">
                                <div class="number-image">
                                    <img src="assets/images/process/style1/2.png" alt="Process">
                                </div>
                                <div class="number-text">
                                    <div class="number-area"> <span class="number-prefix"> 2 </span></div>
                                    <div class="number-title">
                                        <h3 class="title">Planning</h3>
                                    </div>
                                    <div class="number-txt">
                                        Quisque placerat vitae focus scelerisque. Fusce luctus odio ac nibh luctus,
                                        in porttitor.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 sm-mb-30">
                        <div class="rs-addon-number">
                            <div class="number-part">
                                <div class="number-image">
                                    <img src="assets/images/process/style1/3.png" alt="Process">
                                </div>
                                <div class="number-text">
                                    <div class="number-area"> <span class="number-prefix"> 3 </span></div>
                                    <div class="number-title">
                                        <h3 class="title">Execute</h3>
                                    </div>
                                    <div class="number-txt">
                                        Quisque placerat vitae focus scelerisque. Fusce luctus odio ac nibh luctus,
                                        in porttitor.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="rs-addon-number">
                            <div class="number-part">
                                <div class="number-image">
                                    <img src="assets/images/process/style1/4.png" alt="Process">
                                </div>
                                <div class="number-text">
                                    <div class="number-area"> <span class="number-prefix"> 4 </span></div>
                                    <div class="number-title">
                                        <h3 class="title">Deliver</h3>
                                    </div>
                                    <div class="number-txt">
                                        Quisque placerat vitae focus scelerisque. Fusce luctus odio ac nibh luctus,
                                        in porttitor.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(count($latestJobs) > 1)
        <div class="rs-project style7 pt-100 pb-100 md-pt-70 md-pb-70">
            <div class="container custom">
                <div class="row y-middle">
                    <div class="col-lg-6">
                        <div class="sec-title2 mb-55 md-mb-30">
                            <div class="sub-text">Recent Jobs</div>
                            <h2 class="title mb-23">We provide good availability of jobs for <span>you.</span>
                            </h2>
                        </div>
                    </div>
                    <div class="col-lg-5 text-right md-left">
                        <div class="btn-part mb-90 md-mb-50">
                            <a class="readon consultant discover" href="{{ route('job.list') }}">All Jobs</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid pl-30 pr-30">
                <div class="rs-carousel owl-carousel" data-loop="true" data-items="4" data-margin="30"
                     data-autoplay="false" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
                     data-dots="false" data-nav="false" data-nav-speed="false" data-md-device="4"
                     data-md-device-nav="false" data-md-device-dots="true" data-center-mode="false" data-ipad-device2="2"
                     data-ipad-device-nav2="false" data-ipad-device-dots2="true" data-ipad-device="2"
                     data-ipad-device-nav="false" data-ipad-device-dots="true" data-mobile-device="1"
                     data-mobile-device-nav="false" data-mobile-device-dots="true">

                    @foreach($latestJobs as $index=>$job)
                        <div class="project-item">
                            <div class="project-img">
                                <img class="lazy" data-src="{{ ($job->image !== null) ? asset('/images/job/thumb/thumb_'.@$job->image): asset('assets/frontend/images/career.png')}}"  alt="">
                            </div>
                            <div class="project-content">
                                <div class="project-inner">
                                    <h3 class="title"><a href="{{route('job.single',@$job->slug)}}">{{ucfirst($job->name)}}</a></h3>
                                    <span class="category"><a href="{{route('job.single',@$job->slug)}}">
                                             @if(@$job->end_date >= $today)
                                                {{date('M j, Y',strtotime(@$job->start_date))}} - {{date('M j, Y',strtotime(@$job->end_date))}}
                                            @else
                                                Expired
                                            @endif
                                        </a>
                                    </span>
                                </div>
                                <a class="p-icon" href="{{route('job.single',@$job->slug)}}"><i class="flaticon-right-arrow"></i></a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @endif
    <!-- Process Section Start -->
    <div class="rs-process style1 bg2 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row y-middle">
                <div class="col-lg-5">
                    <div class="sec-title2 md-text-center">
                        <div class="sub-text">Working Process</div>
                        <h2 class="title mb-23 white-color">How we work for our valued <span>customers.</span></h2>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="btn-part text-right md-text-center">
                        <a class="readon consultant discover" href="portfolio.html">View Works</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container custom2">
            <div class="process-effects-layer">
                <div class="row">
                    <div class="col-lg-3 col-md-6 md-mb-30">
                        <div class="rs-addon-number">
                            <div class="number-part">
                                <div class="number-image">
                                    <img src="assets/images/process/style1/1.png" alt="Process">
                                </div>
                                <div class="number-text">
                                    <div class="number-area"> <span class="number-prefix"> 1 </span></div>
                                    <div class="number-title">
                                        <h3 class="title"> Discovery</h3>
                                    </div>
                                    <div class="number-txt">
                                        Quisque placerat vitae focus scelerisque. Fusce luctus odio ac nibh luctus,
                                        in porttitor.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 md-mb-30">
                        <div class="rs-addon-number">
                            <div class="number-part">
                                <div class="number-image">
                                    <img src="assets/images/process/style1/2.png" alt="Process">
                                </div>
                                <div class="number-text">
                                    <div class="number-area"> <span class="number-prefix"> 2 </span></div>
                                    <div class="number-title">
                                        <h3 class="title">Planning</h3>
                                    </div>
                                    <div class="number-txt">
                                        Quisque placerat vitae focus scelerisque. Fusce luctus odio ac nibh luctus,
                                        in porttitor.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 sm-mb-30">
                        <div class="rs-addon-number">
                            <div class="number-part">
                                <div class="number-image">
                                    <img src="assets/images/process/style1/3.png" alt="Process">
                                </div>
                                <div class="number-text">
                                    <div class="number-area"> <span class="number-prefix"> 3 </span></div>
                                    <div class="number-title">
                                        <h3 class="title">Execute</h3>
                                    </div>
                                    <div class="number-txt">
                                        Quisque placerat vitae focus scelerisque. Fusce luctus odio ac nibh luctus,
                                        in porttitor.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="rs-addon-number">
                            <div class="number-part">
                                <div class="number-image">
                                    <img src="assets/images/process/style1/4.png" alt="Process">
                                </div>
                                <div class="number-text">
                                    <div class="number-area"> <span class="number-prefix"> 4 </span></div>
                                    <div class="number-title">
                                        <h3 class="title">Deliver</h3>
                                    </div>
                                    <div class="number-txt">
                                        Quisque placerat vitae focus scelerisque. Fusce luctus odio ac nibh luctus,
                                        in porttitor.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Process Section End -->

    <!-- Blog Start -->
    <div class="rs-blog style2 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row y-middle md-mb-30">
                <div class="col-lg-5 mb-20 md-mb-10">
                    <div class="sec-title2">
                        <div class="sub-text">News Updates</div>
                        <h2 class="title mb-23">Read our latest updates & business <span>tips & tricks.</span></h2>
                    </div>
                </div>
                <div class="col-lg-7 mb-20">
                    <div class="btn-part text-right md-left">
                        <a class="readon consultant discover" href="blog-details.html">View Updates</a>
                    </div>
                </div>
            </div>
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30"
                 data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
                 data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false"
                 data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="true"
                 data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="true" data-ipad-device2="2"
                 data-ipad-device-nav2="false" data-ipad-device-dots2="true" data-md-device="3"
                 data-md-device-nav="false" data-md-device-dots="true">
                <div class="blog-item">
                    <div class="image-wrap">
                        <a href="#"><img src="assets/images/blog/1.jpg" alt="Blog"></a>
                        <ul class="post-categories">
                            <li><a href="blog-details.html">Branding</a></li>
                        </ul>
                    </div>
                    <div class="blog-content">
                        <ul class="blog-meta mb-10">
                            <li class="admin"> <i class="fa fa-user-o"></i> admin</li>
                            <li class="date"> <i class="fa fa-calendar-check-o"></i> 16 Aug 2021</li>
                        </ul>
                        <h3 class="blog-title"><a href="blog-details.html">Customer Onboarding Strategy: A Guide to
                                Class</a></h3>
                        <p>We denounce with righteous indige nation and dislike men who are so beguiled and demo...
                        </p>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="image-wrap">
                        <a href="#"><img src="assets/images/blog/2.jpg" alt="Blog"></a>
                        <ul class="post-categories">
                            <li><a href="blog-details.html">Branding</a></li>
                        </ul>
                    </div>
                    <div class="blog-content">
                        <ul class="blog-meta mb-10">
                            <li class="admin"> <i class="fa fa-user-o"></i> admin</li>
                            <li class="date"> <i class="fa fa-calendar-check-o"></i> 16 Aug 2021</li>
                        </ul>
                        <h3 class="blog-title"><a href="blog-details.html">How to plan a fail-proof website redesign
                                strategy</a></h3>
                        <p>We denounce with righteous indige nation and dislike men who are so beguiled and demo...
                        </p>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="image-wrap">
                        <a href="#"><img src="assets/images/blog/3.jpg" alt="Blog"></a>
                        <ul class="post-categories">
                            <li><a href="blog-details.html">Digital Marketing</a></li>
                        </ul>
                    </div>
                    <div class="blog-content">
                        <ul class="blog-meta mb-10">
                            <li class="admin"> <i class="fa fa-user-o"></i> admin</li>
                            <li class="date"> <i class="fa fa-calendar-check-o"></i> 16 Aug 2021</li>
                        </ul>
                        <h3 class="blog-title"><a href="blog-details.html">How investing in dependend increasing to
                                business</a></h3>
                        <p>We denounce with righteous indige nation and dislike men who are so beguiled and demo...
                        </p>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="image-wrap">
                        <a href="#"><img src="assets/images/blog/4.jpg" alt="Blog"></a>
                        <ul class="post-categories">
                            <li><a href="blog-details.html">Digital Marketing</a></li>
                        </ul>
                    </div>
                    <div class="blog-content">
                        <ul class="blog-meta mb-10">
                            <li class="admin"> <i class="fa fa-user-o"></i> admin</li>
                            <li class="date"> <i class="fa fa-calendar-check-o"></i> 16 Aug 2021</li>
                        </ul>
                        <h3 class="blog-title"><a href="blog-details.html">7 Productivity tips to avoid burnout when
                                working</a></h3>
                        <p>We denounce with righteous indige nation and dislike men who are so beguiled and demo...
                        </p>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="image-wrap">
                        <a href="#"><img src="assets/images/blog/5.jpg" alt="Blog"></a>
                        <ul class="post-categories">
                            <li><a href="blog-details.html">Graphic Design</a></li>
                        </ul>
                    </div>
                    <div class="blog-content">
                        <ul class="blog-meta mb-10">
                            <li class="admin"> <i class="fa fa-user-o"></i> admin</li>
                            <li class="date"> <i class="fa fa-calendar-check-o"></i> 16 Aug 2021</li>
                        </ul>
                        <h3 class="blog-title"><a href="blog-details.html">Email marketing tips that will increase
                                your sales</a></h3>
                        <p>We denounce with righteous indige nation and dislike men who are so beguiled and demo...
                        </p>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="image-wrap">
                        <a href="#"><img src="assets/images/blog/6.jpg" alt="Blog"></a>
                        <ul class="post-categories">
                            <li><a href="blog-details.html"></a></li>
                        </ul>
                    </div>
                    <div class="blog-content">
                        <ul class="blog-meta mb-10">
                            <li class="admin"> <i class="fa fa-user-o"></i> admin</li>
                            <li class="date"> <i class="fa fa-calendar-check-o"></i> 16 Aug 2021</li>
                        </ul>
                        <h3 class="blog-title"><a href="blog-details.html">How to maintain customer relations
                                disaster strikes</a></h3>
                        <p>We denounce with righteous indige nation and dislike men who are so beguiled and demo...
                        </p>
                    </div>
                </div>
                <div class="blog-item">
                    <div class="image-wrap">
                        <a href="#"><img src="assets/images/blog/1.jpg" alt="Blog"></a>
                        <ul class="post-categories">
                            <li><a href="blog-details.html">E-commerce</a></li>
                        </ul>
                    </div>
                    <div class="blog-content">
                        <ul class="blog-meta mb-10">
                            <li class="admin"> <i class="fa fa-user-o"></i> admin</li>
                            <li class="date"> <i class="fa fa-calendar-check-o"></i> 16 Aug 2021</li>
                        </ul>
                        <h3 class="blog-title"><a href="blog-details.html">How to plan a fail-proof website redesign
                                strategy</a></h3>
                        <p>We denounce with righteous indige nation and dislike men who are so beguiled and demo...
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

    <!-- Testimonial Section Start -->
    <div class="rs-testimonial style2 bg10 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="sec-title2 text-center md-left mb-30">
                <div class="sub-text">Testimonials</div>
                <h2 class="title mb-0 white-color">Whats our customers saying<br> about us</h2>
            </div>
            <div class="rs-carousel owl-carousel" data-loop="true" data-items="3" data-margin="30"
                 data-autoplay="true" data-hoverpause="true" data-autoplay-timeout="5000" data-smart-speed="800"
                 data-dots="false" data-nav="false" data-nav-speed="false" data-center-mode="false"
                 data-mobile-device="1" data-mobile-device-nav="false" data-mobile-device-dots="true"
                 data-ipad-device="2" data-ipad-device-nav="false" data-ipad-device-dots="true" data-ipad-device2="2"
                 data-ipad-device-nav2="false" data-ipad-device-dots2="true" data-md-device="3"
                 data-md-device-nav="false" data-md-device-dots="true">
                <div class="testi-wrap">
                    <div class="item-content">
                        <span><img src="assets/images/testimonial/quote.png" alt="Testimonial"></span>
                        <p>Customer support is excellent and documentation good – novice can easily understand.
                            Although I had a problem with the performance, thanks to the customer support, we have
                            solved this problem as well.</p>
                    </div>
                    <div class="testi-content">
                        <div class="image-wrap">
                            <img src="assets/images/testimonial/avatar/1.jpg" alt="Testimonial">
                        </div>
                        <div class="testi-information">
                            <div class="testi-name">David Warner</div>
                            <span class="testi-title">Envato User</span>
                            <div class="ratting-img">
                                <img src="assets/images/testimonial/ratting.png" alt="Testimonial">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi-wrap">
                    <div class="item-content">
                        <span><img src="assets/images/testimonial/quote.png" alt="Testimonial"></span>
                        <p>Customer support is excellent and documentation good – novice can easily understand.
                            Although I had a problem with the performance, thanks to the customer support, we have
                            solved this problem as well.</p>
                    </div>
                    <div class="testi-content">
                        <div class="image-wrap">
                            <img src="assets/images/testimonial/avatar/2.jpg" alt="Testimonial">
                        </div>
                        <div class="testi-information">
                            <div class="testi-name">Emily Blunt</div>
                            <span class="testi-title">Web Developer</span>
                            <div class="ratting-img">
                                <img src="assets/images/testimonial/ratting.png" alt="Testimonial">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi-wrap">
                    <div class="item-content">
                        <span><img src="assets/images/testimonial/quote.png" alt="Testimonial"></span>
                        <p>Customer support is excellent and documentation good – novice can easily understand.
                            Although I had a problem with the performance, thanks to the customer support, we have
                            solved this problem as well.</p>
                    </div>
                    <div class="testi-content">
                        <div class="image-wrap">
                            <img src="assets/images/testimonial/avatar/3.jpg" alt="Testimonial">
                        </div>
                        <div class="testi-information">
                            <div class="testi-name">Ansu Fati</div>
                            <span class="testi-title">Marketing</span>
                            <div class="ratting-img">
                                <img src="assets/images/testimonial/ratting.png" alt="Testimonial">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi-wrap">
                    <div class="item-content">
                        <span><img src="assets/images/testimonial/quote.png" alt="Testimonial"></span>
                        <p>Customer support is excellent and documentation good – novice can easily understand.
                            Although I had a problem with the performance, thanks to the customer support, we have
                            solved this problem as well.</p>
                    </div>
                    <div class="testi-content">
                        <div class="image-wrap">
                            <img src="assets/images/testimonial/avatar/4.jpg" alt="Testimonial">
                        </div>
                        <div class="testi-information">
                            <div class="testi-name">Angelina Jolie</div>
                            <span class="testi-title">Graphic Designer</span>
                            <div class="ratting-img">
                                <img src="assets/images/testimonial/ratting.png" alt="Testimonial">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi-wrap">
                    <div class="item-content">
                        <span><img src="assets/images/testimonial/quote.png" alt="Testimonial"></span>
                        <p>Customer support is excellent and documentation good – novice can easily understand.
                            Although I had a problem with the performance, thanks to the customer support, we have
                            solved this problem as well.</p>
                    </div>
                    <div class="testi-content">
                        <div class="image-wrap">
                            <img src="assets/images/testimonial/avatar/1.jpg" alt="Testimonial">
                        </div>
                        <div class="testi-information">
                            <div class="testi-name">David Warner</div>
                            <span class="testi-title">Envato User</span>
                            <div class="ratting-img">
                                <img src="assets/images/testimonial/ratting.png" alt="Testimonial">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi-wrap">
                    <div class="item-content">
                        <span><img src="assets/images/testimonial/quote.png" alt="Testimonial"></span>
                        <p>Customer support is excellent and documentation good – novice can easily understand.
                            Although I had a problem with the performance, thanks to the customer support, we have
                            solved this problem as well.</p>
                    </div>
                    <div class="testi-content">
                        <div class="image-wrap">
                            <img src="assets/images/testimonial/avatar/2.jpg" alt="Testimonial">
                        </div>
                        <div class="testi-information">
                            <div class="testi-name">Emily Blunt</div>
                            <span class="testi-title">Web Developer</span>
                            <div class="ratting-img">
                                <img src="assets/images/testimonial/ratting.png" alt="Testimonial">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi-wrap">
                    <div class="item-content">
                        <span><img src="assets/images/testimonial/quote.png" alt="Testimonial"></span>
                        <p>Customer support is excellent and documentation good – novice can easily understand.
                            Although I had a problem with the performance, thanks to the customer support, we have
                            solved this problem as well.</p>
                    </div>
                    <div class="testi-content">
                        <div class="image-wrap">
                            <img src="assets/images/testimonial/avatar/3.jpg" alt="Testimonial">
                        </div>
                        <div class="testi-information">
                            <div class="testi-name">Ansu Fati</div>
                            <span class="testi-title">Marketing</span>
                            <div class="ratting-img">
                                <img src="assets/images/testimonial/ratting.png" alt="Testimonial">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="testi-wrap">
                    <div class="item-content">
                        <span><img src="assets/images/testimonial/quote.png" alt="Testimonial"></span>
                        <p>Customer support is excellent and documentation good – novice can easily understand.
                            Although I had a problem with the performance, thanks to the customer support, we have
                            solved this problem as well.</p>
                    </div>
                    <div class="testi-content">
                        <div class="image-wrap">
                            <img src="assets/images/testimonial/avatar/4.jpg" alt="Testimonial">
                        </div>
                        <div class="testi-information">
                            <div class="testi-name">Angelina Jolie</div>
                            <span class="testi-title">Graphic Designer</span>
                            <div class="ratting-img">
                                <img src="assets/images/testimonial/ratting.png" alt="Testimonial">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial Section End -->


    <!-- Contact Section Start -->
    <div class="rs-contact contact-style2 bg11 pt-95 pb-100 md-pt-65 md-pb-70">
        <div class="container">
            <div class="sec-title2 mb-55 md-mb-35 text-center text-lg-start">
                <div class="sub-text">Contact</div>
                <h2 class="title mb-0">Let us help your business <br> to move <span>forward.</span></h2>
            </div>
            <div class="row y-middle">
                <div class="col-lg-6 md-mb-50">
                    <div class="contact-img">
                        <img src="assets/images/contact/computer.jpg" alt="Contact">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-wrap">
                        <div id="form-messages"></div>
                        <form id="contact-form" method="post" action="https://reactheme.com/products/html/bizup/mailer.php">
                            <fieldset>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-30">
                                        <input class="from-control" type="text" id="name" name="name"
                                               placeholder="Name" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-30">
                                        <input class="from-control" type="text" id="email" name="email"
                                               placeholder="E-Mail" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-30">
                                        <input class="from-control" type="text" id="phone" name="phone"
                                               placeholder="Phone Number" required="">
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 mb-30">
                                        <input class="from-control" type="text" id="Website" name="subject"
                                               placeholder="Your Website" required="">
                                    </div>

                                    <div class="col-lg-12 mb-30">
                                            <textarea class="from-control" id="message" name="message"
                                                      placeholder="Your message Here" required=""></textarea>
                                    </div>
                                </div>
                                <div class="btn-part">
                                    <div class="form-group mb-0">
                                        <input class="readon submit" type="submit" value="Submit Now">
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact Section End -->

</div>
<!-- Main content End -->

@endsection
@section('js')
    <script src="{{asset('assets/frontend/js/lightbox.min.js')}}"></script>
@endsection
