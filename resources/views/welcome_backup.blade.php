@extends('frontend.layouts.master')
@section('title') Home @endsection
@section('css')

@endsection
@section('content')
    @if(count($sliders) > 0)
        <div class="rts-banner-area banner-three">
            <div class="swiper mySwiperh3_banner">
                <div class="swiper-wrapper">
                    @foreach(@$sliders as $slider)
                        <div class="swiper-slide">
                            <div class="bg_banner-three bg_image rts-section-gap" style="background-image:url({{ asset('/images/sliders/'.$slider->image) }})">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="banner-three-inner">
                                                <span class="subtitle-banner">{{@$slider->subheading ?? ''}}</span>
                                                <!-- type headline start-->
                                                <h1 class="title cd-headline clip is-full-width">
                                                    {{@$slider->heading ?? ''}}
                                                </h1>
                                                <p class="disc">
                                                    {{@$slider->caption1 ?? ''}}
                                                </p>
                                                @if(@$slider->link)
                                                    <div class="button-group">
                                                        <a href="{{@$slider->link ?? ''}}" class="rts-btn btn-primary-3">{{@$slider->button ?? 'Start Exploring'}}</a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if($homepage_info->mission)
        <div class="rts-service-area home-seven rts-section-gap" style="padding-top: 0px!important;">
        <div class="container">
            <div class="row g-5 mt--80">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="service-single-style-six" style="height: 372px;">
                        <div class="icon">
                            <img class="lazy" data-src="{{asset('assets/frontend/images/service/icon/22.svg')}}" alt="">
                        </div>
                        <h5 class="title">
                            Our Mission
                        </h5>
                        <p class="disc">
                            {{ ucfirst(@$homepage_info->mission) }}
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="service-single-style-six" style="height: 372px;">
                        <div class="icon">
                            <img class="lazy" data-src="{{asset('assets/frontend/images/service/icon/24.svg')}}" alt="">
                        </div>
                        <h5 class="title">
                            Our Vision
                        </h5>
                        <p class="disc">
                            {{ ucfirst(@$homepage_info->vision) }}
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="service-single-style-six" style="height: 372px;">
                        <div class="icon">
                            <img class="lazy" data-src="{{asset('assets/frontend/images/service/icon/23.svg')}}" alt="">
                        </div>
                        <h5 class="title">
                            Our Value
                        </h5>
                        <p class="disc">
                            {{ ucfirst(@$homepage_info->value) }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    @if(!empty($homepage_info->welcome_description))
        <div class="rts-about-area rts-section-gap bg-about-sm-shape">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <!-- about left -->
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 order-lg-1 order-md-2 order-sm-2 order-2 mt_md--50 mt_sm--50">
                        <div class="rts-title-area">
                            <p class="pre-title">
                                {{$homepage_info->welcome_subheading ?? ''}}
                            </p>
                            <h2 class="title">{{$homepage_info->welcome_heading ?? ''}}</h2>
                        </div>
                        <div class="about-inner">
                            <p class="disc fs-18 text-justify">
                                {{ ucfirst(@$homepage_info->welcome_description) }}
                            </p>
                            @if(@$homepage_info->welcome_link)
                                <a href="{{@$homepage_info->welcome_link}}" class="rts-btn btn-primary-3 color-h-black">{{ @$homepage_info->welcome_button }}</a>
                            @endif
                        </div>
                    </div>
                    <!-- about right -->

                    <!-- about-right Start-->
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 order-lg-2 order-md-1 order-sm-1 order-1">
                        <div class="about-one-thumbnail">
                            <img src="{{ @$homepage_info->welcome_image ? asset('/images/home/welcome/'.@$homepage_info->welcome_image):''}}" alt="">
                        </div>
                    </div>
                    <!-- about-right end -->
                </div>
            </div>
        </div>
    @endif

    @if(count($latestServices) > 0)

        <div class="rts-service-area rts-section-gapTop pb--200 service-two-bg bg_image">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="rts-title-area service text-center">
                            <p class="pre-title">
                                Our Services
                            </p>
                            <h2 class="title">What we provide</h2>
                        </div>
                    </div>
                </div>
                <div class="row g-5 service padding-controler">
                    @foreach(@$latestServices as $index=>$service)
                        <div class="col-xl-4 col-md-6 col-sm-12 col-12 pb--140 pb_md--100">
                            <div class="service-two-inner">
                                <a href="{{route('service.single',$service->slug)}}" class="thumbnail">
                                    <img class="lazy" data-src="{{asset('/images/service/thumb/thumb_'.@$service->banner_image)}}" alt="Business_image"></a>
                                <div class="body-content">
                                    <div class="hidden-area">
                                        <h5 class="title">{{ucwords(@$service->title)}}</h5>
                                        <p class="dsic">
                                           {{ elipsis(strip_tags($service->description))}}
                                        </p>
                                        <a class="rts-read-more-two color-primary" href="{{route('service.single',$service->slug)}}">Read More<i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if(!empty($homepage_info->core_main_heading))
        <div class="rts-service-area rts-section-gap">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="rts-title-area service core-value text-center">
                            <p class="pre-title">
                                {{ucfirst(@$homepage_info->core_main_description)}}
                            </p>
                            <h2 class="title">{{ucfirst(@$homepage_info->core_main_heading)}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid service-main plr--120-service mt--50 plr_md--0 pl_sm--0 pr_sm--0">
                <div class="background-service row">

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="service-one-inner one">
                            <div class="thumbnail">
                                <img class="lazy" data-src="{{asset('assets/frontend/images/service/icon/01.svg')}}" alt="">
                            </div>
                            <div class="service-details">
                                <a>
                                    <h5 class="title">{{ucwords(@$homepage_info->core_heading1 ?? '')}}</h5>
                                </a>
                                <p class="disc">
                                    {{ucfirst(@$homepage_info->core_description1 ?? '')}}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="service-one-inner two">
                            <div class="thumbnail">
                                <img class="lazy" data-src="{{asset('assets/frontend/images/service/icon/02.svg')}}" alt="">
                            </div>
                            <div class="service-details">
                                <a>
                                    <h5 class="title">{{ucwords(@$homepage_info->core_heading2)}}</h5>
                                </a>
                                <p class="disc">
                                    {{ucfirst(@$homepage_info->core_description2)}}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="service-one-inner three">
                            <div class="thumbnail">
                                <img class="lazy" data-src="{{asset('assets/frontend/images/service/icon/03.svg')}}" alt="">
                            </div>
                            <div class="service-details">
                                <a>
                                    <h5 class="title">{{ucwords(@$homepage_info->core_heading3)}}</h5>
                                </a>
                                <p class="disc">
                                    {{ucfirst(@$homepage_info->core_description3)}}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="service-one-inner four">
                            <div class="thumbnail">
                                <img class="lazy" data-src="{{asset('assets/frontend/images/service/icon/04.svg')}}" alt="">
                            </div>
                            <div class="service-details">
                                <a>
                                    <h5 class="title">{{ucwords(@$homepage_info->core_heading4)}}</h5>
                                </a>
                                <p class="disc">
                                    {{ucfirst(@$homepage_info->core_description4)}}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="service-one-inner five">
                            <div class="thumbnail">
                                <img class="lazy" data-src="{{asset('assets/frontend/images/service/icon/05.svg')}}" alt="">
                            </div>
                            <div class="service-details">
                                <a>
                                    <h5 class="title">{{ucwords(@$homepage_info->core_heading5)}}</h5>
                                </a>
                                <p class="disc">
                                    {{ucfirst(@$homepage_info->core_description5)}}
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="service-one-inner six">
                            <div class="thumbnail">
                                <img class="lazy" data-src="{{asset('assets/frontend/images/service/icon/06.svg')}}" alt="">
                            </div>
                            <div class="service-details">
                                <a>
                                    <h5 class="title">{{ucwords(@$homepage_info->core_heading6)}}</h5>
                                </a>
                                <p class="disc">
                                    {{ucfirst(@$homepage_info->core_description6)}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @if(!empty($homepage_info->action_heading))
                    <div class="row">
                    <div class="cta-one-bg col-12 cta-homepage">
                        <div class="cta-one-inner">
                            <div class="cta-left">
                                <h3 class="title animated fadeIn">{{@$homepage_info->action_heading}}</h3>
                            </div>
                            <div class="cta-right">
                                <a class="rts-btn btn-white" href="{{@$homepage_info->action_link2}}"> {{@$homepage_info->action_link ?? 'Learn more'}}</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    @endif

    @if(!empty($homepage_info->why_heading))
        <div class="rts-business-solution rts-section-gap">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <!-- business solution left -->
                        <div class="rts-business-solution-left">
                            <div class="thumbnail">
                                <img class="lazy" data-src="{{asset('/images/home/welcome/'.@$homepage_info->what_image5)}}" alt="">
                            </div>
                        </div>
                        <!-- business solution left End -->
                    </div>
                    <div class="col-lg-6">
                        <div class="rts-business-solution-right">
                            <div class="title-area">
                                <span class="sub">
                                    Leading Business Solution
                                </span>
                                <h2 class="title">
                                   {{@$homepage_info->why_heading ?? ''}}
                                </h2>
                            </div>
                            <div class="content-area">
                                <p class="disc">
                                    {{ucwords(@$homepage_info->why_description)}}
                                </p>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="single-business-solution-2">
                                            <div class="icon">
                                                <img src="{{asset('assets/frontend/images/counterup/icon/01.svg')}}" alt="">
                                            </div>
                                            <div class="content">
                                                <div class="counter-details">
                                                    <h2 class="title"><span class="counter animated fadeInDownBig">{{@$homepage_info->project_completed ?? '450'}}</span></h2>
                                                    <p class="disc"> Project completed</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="single-business-solution-2">
                                            <div class="icon">
                                                <img src="{{asset('assets/frontend/images/counterup/icon/04.svg')}}" alt="">
                                            </div>
                                            <div class="content">
                                                <div class="counter-details">
                                                    <h2 class="title"><span class="counter animated fadeInDownBig">{{@$homepage_info->happy_clients ?? '660'}}</span></h2>
                                                    <p class="disc">Happy Clients</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-4">
                                        <div class="single-business-solution-2">
                                            <div class="icon">
                                                <img src="{{asset('assets/frontend/images/counterup/icon/03.svg')}}" alt="">
                                            </div>
                                            <div class="content">
                                                <div class="counter-details">
                                                    <h2 class="title"><span class="counter animated fadeInDownBig">{{@$homepage_info->visa_approved ?? '340'}}</span></h2>
                                                    <p class="disc"> Visa Approved</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt-4">
                                        <div class="single-business-solution-2">
                                            <div class="icon">
                                                <img src="{{asset('assets/frontend/images/counterup/icon/02.svg')}}" alt="">
                                            </div>
                                            <div class="content">
                                                <div class="counter-details">
                                                    <h2 class="title"><span class="counter animated fadeInDownBig">{{@$homepage_info->success_stories ?? '987'}}</span></h2>
                                                    <p class="disc">Success Stories</p>
                                                </div>
                                            </div>
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

    @if(@$recruitments[0]->heading)
        <div class="working-process-area rts-section-gap working-process-bg">
            <div class="container">
                <div class="row mt--40">
                    <div class="title-area text-center">
                        <span>{{@$recruitments[0]->description ?? 'Working Steps'}}</span>
                        <h2 class="title">Our Basic Work Process</h2>
                    </div>
                </div>
                <div class="row g-5 mt--20 align-items-center">
                    @foreach(@$recruitments as $index=>$recruitment)
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                            <!-- single wirking process -->
                            <div class="rts-working-process-1 {{ $loop->even ? 'process-lg':'' }} text-center">
                                <div class="inner">
                                    <div class="icon">
                                        <img class="lazy" data-src="{{ asset('assets/frontend/images/working-step/icon/'.recruitment_process_icons($index)) }}" alt="">
                                    </div>
                                </div>
                                <div class="content">
                                    <h6 class="title">{{@$recruitment->title}}</h6>
                                    <p class="disc">
                                      {{ $recruitment->icon_description ?? '' }}
                                    </p>
                                </div>
                            </div>
                            <!-- single wirking process End -->
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    @endif
    @if(count($latestJobs) > 1)
        <section class="case-study-area case-bg2 nav-style-1 pt--115 pt_md--60 pt_xs--60 pb--115 pb_md--60 pb_xs--60">
            <div class="container">
                <div class="row">
                    <div class="rts-title-area gallery text-start pl_sm--20">
                        <p class="pre-title">
                            Our Latest Job
                        </p>
                        <h2 class="title">View & Apply for suitable one</h2>
                    </div>
                    @foreach($latestJobs as $index=>$job)
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="item">
                                <div class="cases-wrapper2">
                                    <div class="item-image">
                                        <img class="lazy" data-src="{{ ($job->image !== null) ? asset('/images/job/thumb/thumb_'.@$job->image): asset('assets/frontend/images/win.png')}}" alt="Image">
                                    </div>
                                    <div class="item-content">
                                        <h6>
                                            @if(@$job->end_date >= $today)
                                                {{date('M j, Y',strtotime(@$job->start_date))}} - {{date('M j, Y',strtotime(@$job->end_date))}}
                                            @else
                                                Expired
                                            @endif
                                        </h6>
                                        <h5 class="fs-20 text-heding3">{{ucfirst($job->name)}}</h5>
                                    </div>
                                    <a href="{{route('job.single',@$job->slug)}}" class="read-more">View Details
                                        <span class="f-right">
                                            <i class="fa fa-long-arrow-right"></i>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @if(count($clients) > 0)
        <div class="rts-trusted-client rts-section-gapBottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title-area-client text-center">
                            <p class="client-title">Our Trusted Clients</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="client-wrapper-one">
                        @foreach($clients as $client)
                            <a href="{{ $client->link ?? '#' }}"  target="{{ ($client->link !== null) ? '_blank':'' }}">
                                <img class="lazy client-image" data-src="{{asset('/images/clients/'.@$client->image)}}" alt=""></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if(count($testimonials) > 0)
        <div class="rts-customer-feedback-area-six rts-section-gap bg-feedback-seven">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title-area text-center">
                            <p class="pre-title">
                                Clients Sayings
                            </p>
                            <h2 class="title">
                                Our Customer Feedbacks
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row mt--40">
                    <div class="swiper mySwiperh2_clients">
                        <div class="swiper-wrapper">
                            @foreach($testimonials as $testimonial)
                                <div class="swiper-slide">
                                    <div class="rts-client-reviews-h2 six">
                                        <div class="review-header">
                                            <a href="#" class="thumbnail">
                                                <img class="lazy" data-src="{{asset('/images/testimonial/'.@$testimonial->image)}}" alt="">
                                            </a>
                                            <div class="discription">
                                                <a>
                                                    <h6 class="title">{{ucfirst($testimonial->name)}}</h6>
                                                </a>
                                                <span>{{ucfirst($testimonial->position)}}</span>
                                            </div>
                                        </div>
                                        <div class="review-body">
                                            <p class="disc">
                                                {{ucfirst($testimonial->description)}}
                                            </p>
                                            <div class="body-end">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if(count($latestPosts) > 0)
        <div class="rts-blog-area rts-section-gap style-seven">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="title-area text-center">
                            <span>Blog Posts</span>
                            <h2 class="title">News & Updates</h2>
                        </div>
                    </div>
                </div>
                <div class="g-5 mt--20">
                    <div class="swiper mySwiperh1_blog">
                        <div class="swiper-wrapper">
                            @foreach(@$latestPosts as $post)
                                <div class="swiper-slide">
                                <div class="single-blog-one-wrapper">
                                    <div class="thumbnail">
                                        <img class="lazy" data-src="{{asset('/images/blog/'.@$post->image)}}"  alt="">
                                        <div class="blog-badge">
                                            <span>{{date('d M Y', strtotime($post->created_at))}}</span>
                                        </div>
                                    </div>
                                    <div class="blog-content">
                                        <p><span>{{ucfirst(@$post->category->name)}} </span></p>
                                        <a href="{{route('blog.single',$post->slug)}}">
                                            <h5 class="title">{{ucfirst($post->title)}} </h5>
                                        </a>
                                        <a class="rts-read-more btn-primary" href="{{route('blog.single',$post->slug)}}"><i
                                                class="fa fa-arrow-right"></i>Read
                                            More</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if(@$setting_data->grievance_heading)
        <div class="rts-about-area rts-section-gap bg-light-white">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="about-image-v-inner">
                            <div class="image-area">
                                <iframe src="{{@$setting_data->google_map ?? ''}}"
                                        width="600" height="600" style="border:0;"
                                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-progress-inner">
                            <div class="title-area">
                                <span>Careerlink</span>
                                <h2 class="title">{{@$setting_data->grievance_heading}}</h2>
                            </div>
                            <!-- inner start -->
                            <div class="inner">
                                <div class="disc fs-18 text-justify line-height-30">
                                    {{ ucfirst(@$setting_data->grievance_description) }}</div>

                                <a href="{{route('contact')}}" class="rts-btn btn-primary">Make an Appointment</a>
                            </div>
                            <!-- end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
@section('js')
    <script src="{{asset('assets/frontend/js/lightbox.min.js')}}"></script>
@endsection
