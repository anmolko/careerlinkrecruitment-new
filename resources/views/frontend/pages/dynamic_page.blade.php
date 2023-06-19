@extends('frontend.layouts.master')
@section('title') {{ucwords(@$page_detail->name)}} @endsection
@section('css')
    <style>

        .img-wrapper {
            height: 270px;
            object-fit: cover;
        }
        #gallery img.img-responsive {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <link rel="stylesheet" href="{{asset('assets/common/lightbox.css')}}">

@endsection
@section('content')
    <div class="rts-breadcrumb-area bg_image"
         style="background:linear-gradient(rgb(41 122 190 / 63%), rgb(233 63 51 / 30%)), url( {{ $page_detail->image ? asset('images/page/'.$page_detail->image) : asset('assets/frontend/images/breadcrumb/01.jpg') }} ); margin-bottom:30px;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">{{ucwords(@$page_detail->name)}}</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="/">Home</a>
                        <span> / </span>
                        <a href="#" class="active">{{ucwords(@$page_detail->name)}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @foreach($sections as $key=>$value)

        @if($value == "basic_section")
            <div class="rts-business-goal rts-business-goal2 mt--0 rts-section-gapBottom" style="padding-bottom: 30px;!important;">
                <div class="container">
                    <div class="row">
                        <!-- business goal left -->
                        <div class="col-lg-6">
                            <div class="business-goal-one">
                                <img class="lazy" data-src="{{asset('/images/section_elements/basic_section/'.@$basic_elements->image) }}" alt="">
                            </div>
                        </div>
                        <!-- business goal right -->

                        <!-- right area business -->
                        <div class="col-lg-6 mt--35 mt_md--70 mt_sm--70 mb_sm--35">
                            <div class="business-goal-right">
                                <div class="rts-title-area business text-start pl--30">
                                    <p class="pre-title">
                                        {{@$basic_elements->subheading?? ''}}
                                    </p>
                                    <h2 class="title">{{@$basic_elements->heading ?? ''}}</h2>
                                </div>
                                <div class="rts-business-goal pl--30" style="margin-top: 10px;">
                                    <div class="about-inner">
                                        <p class="disc fs-18 text-justify" style="font-size: 18px!important;  line-height: 30px!important;">
                                            {!! @$basic_elements->description !!}
                                        </p>
                                    </div>
                                    @if(@$basic_elements->button_link)
                                        <div class="goal-button-wrapper mt--10">
                                            <a href="{{@$basic_elements->button_link}}" class="rts-btn btn-primary color-h-black">
                                                {{ucwords(@$basic_elements->button ?? 'Discover More')}}
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- right area business ENd -->
                    </div>
                </div>
            </div>
        @endif

        @if($value == "call_to_action_1")
            <div class="rts-callto-acation-area rts-callto-acation-area4 bg-call-to-action-two mb--80">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="cta-two-wrapper">
                                <div class="title-area">
                                    <h3 class="title animated fadeIn">{{ ucfirst($call1_elements->heading ?? '') }}</h3>
                                </div>
                                <a class="rts-btn btn-secondary-3" href="{{@$call1_elements->button_link ?? '/contact-us'}}">{{ucwords(@$call1_elements->button ?? 'Lets Work Together')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($value == "background_image_section")
            <div class="rts-contact-area contact-one appoinment background-contact-appoinment">
                <div class="">
                    <div class="row g-0 align-items-center">
                        <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                            <div class="contact-image-one appoinment">
                                <img src="{{asset('/images/section_elements/bgimage_section/'.@$bgimage_elements->image)}}" alt="">
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                            <div class="contact-form-area-one">
                                <div class="rts-title-area contact-appoinment text-start">
                                    <p class="pre-title">
                                        {{@$bgimage_elements->subheading ?? ''}}
                                    </p>
                                    <h2 class="title">{{@$bgimage_elements->heading ?? ''}}</h2>
                                </div>
                                <p class="disc custom-fs-line text-justify text-white">
                                    {{ @$bgimage_elements->description }}
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($value == "flash_cards")
            <div class="rts-service-area rts-service-area5" style="margin-top: 50px; margin-bottom: 50px">
                <div class="container">
                    <div class="col-12">
                        <div class="text-center title-service-three">
                            <p class="pre-title">
                                {{$flash_elements[0]->subheading}}
                            </p>
                            <h2 class="title">{{@$flash_elements[0]->heading}}</h2>
                        </div>
                    </div>
                    <div class="row g-5 mt--20">
                        @foreach(@$flash_elements as $index=>$flash_element)
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                            <div class="service-one-inner-four">
                                <a href="#" class="icon">
                                    <img src="{{asset('assets/frontend/images/service/icon/service-logo'.($index+1).'.svg')}}" alt="">
                                </a>
                                <div class="content">
                                    <h5 class="title">{{ucwords(@$flash_element->list_header)}}</h5>
                                    <p class="disc text-justify"> {{ucfirst(@$flash_element->list_description) }}
                                    </p>
                                </div>

                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        @if($value == "simple_header_and_description")
            <div class="rts-service-details-area rts-section-gap" style="padding: 0px!important;">
                <div class="container">
                    @if(@$header_descp_elements->heading!==null)
                        <div class="col-12">
                            <div class="text-center title-service-three">
                                <p class="pre-title">
                                    {{@$header_descp_elements->subheading ?? ''}}
                                </p>
                                <h2 class="title">{{@$header_descp_elements->heading}}</h2>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <!-- service details left area start -->
                            <div class="service-detials-step-1">
                                <div class="disc custom-description text-justify">
                                    {!! @$header_descp_elements->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($value == "map_and_description")
            <div class="rts-about-area rts-section-gap bg-light-white">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6">
                            <div class="about-progress-inner">
                                <div class="title-area">
                                    <span>{{@$map_descp->subheading}}</span>
                                    <h2 class="title">{{@$map_descp->heading}}</h2>
                                </div>
                                <!-- inner start -->
                                <div class="inner">
                                    <div class="disc fs-18 text-justify line-height-30">
                                        {!! ucfirst(@$map_descp->description) !!}}</div>
                                    @if(@$map_descp->button_link)
                                        <a href="{{@$map_descp->button_link}}" class="rts-btn btn-primary">{{ucwords(@$map_descp->button ?? 'Reach out')}}</a>
                                    @endif
                                </div>
                                <!-- end -->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-image-v-inner">
                                <div class="image-area">
                                    <iframe src="{{@$setting_data->google_map ?? ''}}"
                                            width="600" height="600" style="border:0;"
                                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($value == "small_box_description")
            @if(count($process_elements)>0))
                <div class="rts-service-area rts-section-gap" style="padding: 75px 0;">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-center">
                                    <p class="pre-title" style="margin: 0 0 18px;">
                                            {{ ucfirst($process_elements[0]->subheading ?? 'Careerlink')}}
                                    </p>
                                    <h2 class="title">{{@$process_elements[0]->heading}}</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row g-5 mt--10">
                            @for ($i = 1; $i <=@$process_num; $i++)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <!-- single service for home six -->
                                    <div class="single-service-home-six">
                                        <div class="icon">
                                            <img src="{{asset('assets/frontend/images/'. get_solution_icons($i-1))}}" alt="">
                                        </div>
                                        <div class="inner">
                                            <h5 class="title">
                                                {{ucwords(@$process_elements[$i-1]->list_header ??'')}}
                                            </h5>
                                            <p class="disc">
                                                {{ucfirst(@$process_elements[$i-1]->list_description)}}
                                            </p>

                                        </div>
                                    </div>
                                    <!-- single service for home six End -->
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            @endif
        @endif

        @if($value == "gallery_section")
            <div class="rs-project style3 pt-100 pb-100 md-pt-70 md-pb-70">
                <div class="container">
                    @if(@$heading!==null)
                        <div class="sec-title3 text-center mb-65 md-mb-45">
                            <span class="sub-title">  {{@$subheading ?? ''}}</span>
                            <h2 class="title pb-25">
                                {{@$heading}}
                            </h2>
                            <div class="heading-border-line"></div>
                        </div>
                    @endif
                    <div class="row">
                        @if(count(@$singleAlbum->gallery) > 0)
                            <div id="gallery" style="padding: 0px 30px 0 30px;">
                                <div id="image-gallery">
                                    <div class="row">
                                        @foreach($singleAlbum->gallery as $gallery)
                                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                                                <div class="{{  $page_detail->slug =='legal-document' || $page_detail->slug =='legal-documents' ? "":"img-wrapper"   }}">
                                                    <a href="{{asset('/images/albums/gallery/'.@$gallery->filename)}}">
                                                        <img data-src="{{asset('/images/albums/gallery/'.@$gallery->filename)}}" class="img-responsive lazy"></a>
                                                    <div class="img-overlay">
                                                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div><!-- End row -->
                                </div><!-- End image gallery -->
                            </div><!-- End container -->
                        @endif
                    </div>
                </div>
            </div>
        @endif

        @if($value == "slider_list")
            @if(count($slider_list_elements)>0))
                <div class="rts-business-case rts-section-gap business-case-bg-2">
                <div class="container">
                    <div class="row">
                        <div class="title-areas text-center business-case">
                            <span>{{ucwords(@$slider_list_elements[0]->description)}}</span>
                            <h2 class="title">{{ucwords(@$slider_list_elements[0]->heading)}}</h2>
                        </div>
                    </div>
                </div>
                <div class="container-cusiness-case-h2 mt--50">
                    <div class="row">
                        <div class="col-12">
                            <div class="swiper mySwiperh2_Business_Cases">
                                <div class="swiper-wrapper">
                                    @for ($i = 1; $i <=@$list_3; $i++)
                                        <div class="swiper-slide">
                                            <div class="rts-business-case-s-2">
                                                <a href="{{route('slider.single',@$slider_list_elements[$i-1]->subheading)}}" class="thumbnail">
                                                    <img src="{{ asset('/images/section_elements/list_1/thumb/thumb_'.$slider_list_elements[$i-1]->list_image) }}" alt="Business_case">
                                                </a>
                                                <div class="inner">
                                                    <a href="{{route('slider.single',@$slider_list_elements[$i-1]->subheading)}}">
                                                        <h5 class="title">
                                                            {{ucwords(@$slider_list_elements[$i-1]->list_header)}}
                                                        </h5>
                                                    </a>
                                                    <span>  {{ elipsis(strip_tags(@$slider_list_elements[$i-1]->list_description))}}</span>
                                                </div>
                                                <a href="{{route('slider.single',@$slider_list_elements[$i-1]->subheading)}}" class="over_link"></a>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @endif

    @endforeach


@endsection
@section('js')
    <script src="{{asset('assets/common/lightbox.min.js')}}"></script>
  <script>
      $( document ).ready(function() {
          let selector = $('.custom-description').find('table').length;
          if(selector>0){
              $('.custom-description').find('table').addClass('table table-bordered');
          }
      });
  </script>
@endsection
