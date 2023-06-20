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
    <div class="rs-breadcrumbs" style="background:linear-gradient(rgb(246 184 51 / 29%), rgb(10 10 10 / 66%)), url( {{ $page_detail->image ? asset('images/page/'.$page_detail->image) : asset('assets/frontend/images/breadcrumbs/inr_1.jpg') }} ); margin-bottom:30px;">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title">
                    {{ucwords(@$page_detail->name)}}
                </h1>
            </div>
        </div>
    </div>

    @foreach($sections as $key=>$value)

        @if($value == "basic_section")
            <div class="rs-about style2 pt-20 pb-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 pr-33 md-pr-15 md-mb-50">
                            <div class="images-part">
                                <img class="lazy" data-src="{{asset('/images/section_elements/basic_section/'.@$basic_elements->image) }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="sec-title">
                                <h2 class="title">
                                    {{@$basic_elements->heading ?? ''}}
                                </h2>
                                <div class="margin-0 pt-10 text-justify"> {!! @$basic_elements->description !!}</div>
                                @if(@$basic_elements->button_link)
                                    <div class="btn-part mt-3 md-mt-30">
                                        <a class="readon consultant discover" href="{{@$basic_elements->button_link}}">
                                            {{ucwords(@$basic_elements->button ?? 'Discover More')}}
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="rs-animation">
                    <div class="animate-style">
                        <img class="scale" src="{{asset('assets/frontend/images/about/tri-circle-1.png')}}" alt="About">
                    </div>
                </div>
            </div>
        @endif

        @if($value == "call_to_action_1")
            <div class="rs-cta style1 bg13 pt-70 pb-60 md-pt-70 md-pb-65">
                <div class="container">
                    <div class="row y-middle">
                        <div class="col-lg-7 md-mb-30">
                            <div class="sec-title2">
                                <div class="sub-text">{{@$call1_elements->subheading ?? ''}}</div>
                                <h2 class="title white-color margin-0">
                                    <?php
                                    $split = explode(" ", @$call1_elements->heading);?> {{preg_replace('/\W\w+\s*(\W*)$/', '$1', @$call1_elements->heading)."\n"}}
                                    <span class="new-next"> {{$split[count($split)-1]}} </span>
                                </h2>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="btn-part text-right md-left mt-3">
                                <a class="readon consultant discover" href="{{@$call1_elements->button_link ?? '/contact-us'}}">
                                    {{ucwords(@$call1_elements->button ?? 'Get Started')}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($value == "background_image_section")
            <div class="rs-about bg19 pt-40 pb-80 md-pb-70">
                <div class="container">
                    <div class="row y-middle">
                        <div class="col-lg-6 pr-50 md-pr-15">
                            <div class="sec-title">
                                <h2 class="title title4 pb-30">
                                    {{@$bgimage_elements->heading ?? ''}}
                                </h2>
                                <div class="margin-0 pb-30 text-justify">
                                    {{ @$bgimage_elements->description }}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="images-part">
                                <img src="{{asset('/images/section_elements/bgimage_section/'.@$bgimage_elements->image)}}" alt="Images">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        @if($value == "flash_cards")
            <div class="rs-services style1 modify shape-bg pt-128 md-pt-70 pb-140 md-pb-80">
                <div class="container">
                    <div class="sec-title4 text-center mb-60">
                        <div class="sub-title mb-6">{{$flash_elements[0]->subheading ?? ''}}</div>
                        <h2 class="title primary-color">{{@$flash_elements[0]->heading ?? ''}}</h2>
                    </div>
                    <div class="row service-wrap mr-0 ml-0">
                        @foreach(@$flash_elements as $index=>$flash_element)
                            <div class="col-lg-4 padding-0 {{ $loop->first ? 'pr-1':'' }}">
                                <div class="service-grid">
                                    <div class="service-icon mb-23">
                                        <img src="{{ asset('assets/frontend/images/services/'.get_icons($index)) }}" alt="">
                                    </div>
                                    <h4 class="title mb-18">
                                        <a>
                                            {{ucwords(@$flash_element->list_header)}}
                                        </a>
                                    </h4>
                                    <div class="desc mb-12">
                                        {{ucfirst(@$flash_element->list_description) }}
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
                        @if(count(@$gallery_elements) > 0)
                            <div id="gallery" style="padding: 0px 30px 0 30px;">
                                <div id="image-gallery">
                                    <div class="row">
                                        @foreach($gallery_elements as $gallery)
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
