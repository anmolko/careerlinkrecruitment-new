@extends('frontend.layouts.seo_master')
@section('title') Job List @endsection
@section('css')
@endsection
@section('seo')
    <title>{{ucfirst(@$singleJob->name)}} | {{ucwords(@$setting_data->website_name ?? 'Careerlink')}}</title>
    <meta name='description' itemprop='description'  content='{{ucfirst(@$singleJob->meta_description)}}' />
    <meta name='keywords' content='{{ucfirst(@$singleJob->meta_tags)}}' />
    <meta property='article:published_time' content='{{@$singleJob->updated_at ?? @$singleJob->created_at}}' />
    <meta property='article:section' content='article' />
    <meta property="og:description" content="{{ucfirst(@$singleJob->meta_description)}}" />
    <meta property="og:title" content="{{ucfirst(@$singleJob->meta_title)}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="Coperation" />
    <meta property="og:locale" content="en-us" />
    <meta property="og:locale:alternate"  content="en-us" />
    <meta property="og:site_name" content="{{ucwords(@$setting_data->website_name ?? 'Careerlink')}}" />
    <meta property="og:image" content="{{asset('/images/job/'.@$singleJob->image)}}" />
    <meta property="og:image:url" content="{{asset('/images/job/'.@$singleJob->image)}}" />
    <meta property="og:image:size" content="300" />
@endsection
@section('content')
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">Job Details</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="/">Home</a>
                        <span> / </span>
                        <a href="{{route('job.list')}}" style="padding-left: 5px">Jobs</a>
                        <span> / </span>
                        <a class="active">{{ @$singleJob->name }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-project-details-area rts-section-gap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="big-bg-porduct-details">
                        <img src="{{ ($singleJob->image !== null) ? asset('/images/job/'.@$singleJob->image): asset('assets/frontend/images/space.png')}}" alt="">
                    </div>
                </div>
            </div>
            <div class="row mt--70 mb--50">
                <div class="col-4">
                    <div class="big-bg-porduct-details">
                        <div class="project-info" style="position:relative;">
                            <div class="info-head">
                                <h5 class="title">{{@$singleJob->title ?? 'General Details'}}</h5>
                            </div>
                            <div class="info-body">
                                <!-- single info -->
                                <div class="single-info">
                                    <div class="info-ico">
                                        <i class="fas fa-calendar-alt"></i>
                                    </div>
                                    <div class="info-details">
                                        <span>Expires on :</span>
                                        <h6 class="name">{{date('M j, Y',strtotime(@$singleJob->end_date))}}</h6>
                                    </div>
                                </div>
                                @if(@$singleJob->getJobCategories(@$singleJob->category_ids) !== 'N/A')
                                    <div class="single-info">
                                        <div class="info-ico">
                                            <i class="fas fa-layer-group"></i>
                                        </div>
                                        <div class="info-details">
                                            <span>Category:</span>
                                            <h6 class="name">{{ucwords(@$singleJob->getJobCategories($singleJob->category_ids))}}</h6>
                                        </div>
                                    </div>
                                @endif
                                @if($singleJob->extra_company)
                                    <div class="single-info">
                                        <div class="info-ico">
                                            <i class="fas fa-building"></i>
                                        </div>
                                        <div class="info-details">
                                            <span>Company:</span>
                                            <h6 class="name">{{ucwords(@$singleJob->extra_company)}}</h6>
                                        </div>
                                    </div>
                                @endif
                                @if($singleJob->min_qualification)
                                    <div class="single-info">
                                        <div class="info-ico">
                                            <i class="fas fa-graduation-cap"></i>
                                        </div>
                                        <div class="info-details">
                                            <span>Min. Qualification</span>
                                            <h6 class="name">{{ucwords(@$singleJob->min_qualification)}}</h6>
                                        </div>
                                    </div>
                                @endif
                                @if($singleJob->salary)
                                    <div class="single-info">
                                        <div class="info-ico">
                                            <i class="fas fa-cash-register"></i>
                                        </div>
                                        <div class="info-details">
                                            <span>Salary</span>
                                            <h6 class="name">{{ucwords(@$singleJob->salary)}}</h6>
                                        </div>
                                    </div>
                                @endif
                                @if($singleJob->required_number)
                                    <div class="single-info">
                                        <div class="info-ico">
                                            <i class="fas fa-poll-people"></i>
                                        </div>
                                        <div class="info-details">
                                            <span>Required number</span>
                                            <h6 class="name">{{ucwords(@$singleJob->required_number)}}</h6>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="product-details-main-inner">
                        <span>Job description</span>
                        <h3 class="title">{{ ucwords(@$singleJob->name) }}</h3>
                        <div class="disc custom-description">{!! $singleJob->description !!} </div>
                        <div class="details-share">
                            <h6>Share:</h6>
                            <a><i class="fab fa-facebook-f" onclick='fbShare("{{route('job.single',$singleJob->slug)}}")'></i></a>
                            <a><i class="fab fa-twitter" onclick='twitShare("{{route('job.single',$singleJob->slug)}}","{{ $singleJob->title }}")'></i></a>
                            <a><i class="fab fa-whatsapp" onclick='whatsappShare("{{route('job.single',$singleJob->slug)}}","{{ $singleJob->title }}")'></i></a>
                        </div>
                    </div>
                </div>
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
