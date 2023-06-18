@extends('frontend.layouts.master')
@section('title') Album @endsection
@section('styles')
@endsection
@section('content')
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">Albums</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="/">Home</a>
                        <span> / </span>
                        <a href="#" class="active">Our album</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="portfolio-area style-4 pt--120 pb--120 pt_xs--60 pt_xs--60">
        <div class="container">
            <div class="row">
                @foreach($albums as $album)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="item">
                            <div class="portfolio-wrapper">
                                <div class="img-fluid">
                                    <img class="lazy" data-src="{{asset('/images/albums/'.@$album->cover_image)}}" alt="" />
                                </div>
                                <div class="single-portfolio">
                                    <span>Images: ({{count(@$album->gallery)}})</span>
                                    <h4 class="portfolio-title text-white">{{ucwords(@$album->name)}}</h4>
                                </div>
                                <a class="pf-btn" href="{{route('album.gallery',$album->slug)}}"><i class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection


