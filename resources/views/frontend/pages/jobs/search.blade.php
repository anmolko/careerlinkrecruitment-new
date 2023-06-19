@extends('frontend.layouts.master')
@section('title') Search | Jobs @endsection
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

    <!-- Breadcrumbs Start -->
    <div class="rs-breadcrumbs img4">
        <div class="container">
            <div class="breadcrumbs-inner">
                <h1 class="page-title">Jobs Search</h1>
                <span class="sub-text">
                    Search Result For : {{$title}}
                </span>
            </div>
        </div>
    </div>
    <!-- Breadcrumbs End -->

    <div class="rs-project style2 pt-100 pb-100 md-pt-70 md-pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 order-last">
                    @include('frontend.pages.jobs.sidebar')
                </div>
                <div class="col-lg-8 pr-35 md-pr-15 md-mt-50">
                    <div class="row">
                        @foreach($alljobs as $job)
                            <div class="col-lg-6 col-md-6 mb-30">
                                <div class="project-item">
                                    <div class="project-img">
                                        <img class="lazy" data-src="{{ ($job->image !== null) ? asset('/images/job/thumb/thumb_'.@$job->image): asset('assets/frontend/images/space.png')}}" alt="">
                                    </div>
                                    <div class="project-content">
                                        <a class="p-icon" href="{{route('job.single',@$job->slug)}}"><i class="custom-icon"></i></a>
                                        <div class="project-inner">
                                            <span class="category"><a>
                                                      @if(@$job->end_date >= $today)
                                                        {{date('M j, Y',strtotime(@$job->start_date))}} - {{date('M j, Y',strtotime(@$job->end_date))}}
                                                    @else
                                                        Expired
                                                    @endif
                                                </a>
                                            </span>
                                            <h3 class="title"><a href="{{route('job.single',@$job->slug)}}">{{ucfirst($job->name)}}</a></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-lg-12">
                            <div class="pagination-area">
                                {{ $alljobs->links('vendor.pagination.default') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
