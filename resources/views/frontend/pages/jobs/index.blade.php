@extends('frontend.layouts.master')
@section('title') Job List @endsection
@section('css')
    <style>
        .text-flow {
            overflow: hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2; /* number of lines to show */
            line-clamp: 2;
            -webkit-box-orient: vertical;
        }
    </style>
@endsection
@section('content')

    <!-- start breadcrumb area -->
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">Job List</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="/">Home</a>
                        <span> / </span>
                        <a href="#" class="active">Our Jobs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="case-study-area case-bg2 nav-style-1 pt--115 pt_md--60 pt_xs--60 pb--115 pb_md--60 pb_xs--60">
        <div class="container">
            <div class="row g-5">
                <!-- rts blo post area -->
                <div class="col-xl-8 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        @foreach($alljobs as $job)
                            <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="item">
                                <div class="cases-wrapper2">
                                    <div class="item-image">
                                        <img src="{{ ($job->image !== null) ? asset('/images/job/thumb/thumb_'.@$job->image): asset('assets/frontend/images/space.png')}}" alt="Image">
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
                                    <a href="{{route('job.single',@$job->slug)}}" class="read-more">View details <span class="f-right"><i class="fa fa-long-arrow-right"></i></span></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{ $alljobs->links('vendor.pagination.simple-bootstrap-4') }}
                    </div>
                </div>

                <div class="col-xl-4 col-md-12 col-sm-12 col-12">
                    @include('frontend.pages.jobs.sidebar')
                </div>
            </div>
        </div>
    </section>


@endsection
@section('js')
    <!-- For Contact Form -->
    <script src="{{asset('assets/frontend/js/jquery.ajaxchimp.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/form-validator.min.js')}}"></script>
    <script src="{{asset('assets/frontend/js/contact-form-script.js')}}"></script>
@endsection
