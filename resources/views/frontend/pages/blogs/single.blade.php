@extends('frontend.layouts.seo_master')
@section('seo')
    <title>{{ucfirst(@$singleBlog->title)}} |  {{ucwords(@$setting_data->website_name ?? 'Careerlink')}}</title>
    <meta name='description' itemprop='description'  content='{{ucfirst(@$singleBlog->meta_description)}}' />
    <meta name='keywords' content='{{ucfirst(@$singleBlog->meta_tags)}}' />
    <meta property='article:published_time' content='{{ @$singleBlog->updated_at ?? $singleBlog->created_at}}' />
    <meta property='article:section' content='article' />
    <meta property="og:description" content="{{ucfirst(@$singleBlog->meta_description)}}" />
    <meta property="og:title" content="{{ucfirst(@$singleBlog->meta_title)}}" />
    <meta property="og:url" content="{{url()->current()}}" />
    <meta property="og:type" content="Coperation" />
    <meta property="og:locale" content="en-us" />
    <meta property="og:locale:alternate"  content="en-us" />
    <meta property="og:site_name" content="{{ucwords(@$setting_data->website_name ?? 'Careerlink')}}" />
    <meta property="og:image" content="{{asset('/images/blog/'.@$singleBlog->image)}}" />
    <meta property="og:image:url" content="{{asset('/images/blog/'.@$singleBlog->image)}}" />
    <meta property="og:image:size" content="300" />
@endsection
@section('content')
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">Blog List</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="/">Home</a>
                        <span> / </span>
                        <a href="{{route('blog.frontend')}}" style="padding-left: 5px">Blog</a>
                        <span> / </span>
                        <a class="active">{{ @$singleBlog->title }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-blog-list-area rts-section-gap">
        <div class="container">
            <div class="row g-5">

                <div class="col-xl-8 col-md-12 col-sm-12 col-12">
                    <div class="blog-single-post-listing details mb--0">
                        <div class="thumbnail">
                            <img class="lazy" data-src="{{ asset('/images/blog/'.@$singleBlog->image)}}" alt="">
                        </div>
                        <div class="blog-listing-content">
                            <div class="user-info">
                                <!-- single infoe end -->
                                <!-- single info -->
                                <div class="single">
                                    <i class="fa fa-clock"></i>
                                    <span>{{date('j M, Y',strtotime(@$singleBlog->created_at))}}</span>
                                </div>
                                <!-- single infoe end -->
                                <!-- single info -->
                                <div class="single">
                                    <i class="fa fa-tags"></i>
                                    <span>{{@$singleBlog->category->name }}</span>
                                </div>
                                <!-- single infoe end -->
                            </div>
                            <h3 class="title">{{ ucwords(@$singleBlog->title) }}</h3>
                            <div class="disc para-1 custom-description">
                                {!! $singleBlog->description !!}
                            </div>
                            <div class="row  align-items-center">
                                <div class="col-lg-6 col-md-12">
                                    <!-- tags details -->
                                    <div class="details-tag">
                                    </div>
                                    <!-- tags details End -->
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="details-share">
                                        <h6>Share:</h6>

                                            <a ><i class="fab fa-facebook-f" onclick='fbShare("{{route('blog.single',$singleBlog->slug)}}")'></i></a>

                                            <a><i class="fab fa-twitter"  onclick='twitShare("{{route('blog.single',$singleBlog->slug)}}","{{ $singleBlog->title }}")'></i></a>

                                            <a ><i class="fab fa-whatsapp" onclick='whatsappShare("{{route('blog.single',$singleBlog->slug)}}","{{ $singleBlog->title }}")'></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-12 col-sm-12 col-12 mt-5">
                    @include('frontend.pages.blogs.sidebar')
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
                $('.custom-description').find('table').addClass('table table-bordered table-responsive');
            }
        });
</script>
@endsection
