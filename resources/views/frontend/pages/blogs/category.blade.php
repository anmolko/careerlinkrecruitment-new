@extends('frontend.layouts.master')
@section('title') {{ucwords(@$cat_name)}} | Blog @endsection
@section('css')
<style>
.home-one a.active {
    color: #27aae1;
}
</style>
@endsection
@section('content')

    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">Blog Category List</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="/">Home</a>
                        <span> / </span>
                        <a href="#" class="active">{{ucwords($cat_name)}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-blog-list-area rts-section-gap">
        <div class="container">
            <div class="row g-5">
                <!-- rts blo post area -->
                <div class="col-xl-8 col-md-12 col-sm-12 col-12">
                    <div class="row g-5">
                        @foreach($allPosts as $post)
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="blog-grid-inner">
                                    <div class="blog-header">
                                        <a class="thumbnail" href="{{route('blog.single',$post->slug)}}">
                                            <img class="lazy" data-src="{{asset('/images/blog/'.@$post->image) }}" alt="">
                                        </a>
                                        <div class="blog-info">
                                            <div class="user">
                                                <i class="fal fa-tags"></i>
                                                <span>{{ucfirst(@$post->category->name)}}</span>
                                            </div>
                                        </div>
                                        <div class="date">
                                            <h6 class="title">{{date('j',strtotime(@$latest->created_at))}}</h6>
                                            <span>{{date('M',strtotime(@$latest->created_at))}}</span>
                                        </div>
                                    </div>
                                    <div class="blog-body">
                                        <a href="{{route('blog.single',$post->slug)}}">
                                            <h5 class="title">
                                                {{@$post->title}}
                                            </h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        {{ $allPosts->links('vendor.pagination.simple-bootstrap-4') }}

                    </div>
                </div>

                <div class="col-xl-4 col-md-12 col-sm-12 col-12">
                    @include('frontend.pages.blogs.sidebar')
                </div>
            </div>
        </div>
    </div>

@endsection
