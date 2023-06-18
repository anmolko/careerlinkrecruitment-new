@extends('frontend.layouts.master')
@section('title') Clients @endsection
@section('css')
    <style>
        .img-wrapper {
            height: 100px;
            object-fit: cover;
        }
        #gallery img.img-responsive {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <link rel="stylesheet" href="{{asset('assets/frontend/css/plugins/lightbox.css')}}">
@endsection
@section('content')

    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">Our Clients</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="/">Home</a>
                        <span> / </span>
                        <a href="#" class="active">Clients</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="portfolio-area style-4 pt--120 pb--120 pt_xs--60 pt_xs--60">
        <div class="container">
            <div class="row">
                @if(count(@$clients) > 0)
                    <div id="gallery" style="padding: 0px 30px 0 30px;">
                        <div id="image-gallery">
                            <div class="row">
                                @foreach($clients as $client)
                                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 image">
                                        <div class="img-wrapper">
                                            <a href="{{asset('/images/clients/'.@$client->image)}}">
                                                <img data-src="{{asset('/images/clients/'.@$client->image)}}" class="img-responsive lazy"></a>
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
    </section>
@endsection
@section('js')
    <script src="{{asset('assets/frontend/js/plugins/lightbox.min.js')}}"></script>
@endsection
