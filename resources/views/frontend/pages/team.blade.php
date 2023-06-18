@extends('frontend.layouts.master')
@section('title') Team @endsection
@section('css')
    <style>
        .team-member:after{
            height: 340px;
        }
    </style>
@endsection
@section('content')
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">Team</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="/">Home</a>
                        <span> / </span>
                        <a href="#" class="active">Our Team</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-team-area style-3 rts-section-gap">
        <div class="container">
            <div class="row g-5 mt--20 mt_md--30 mt_sm--0">
                @foreach($teams as $team)
                    <div class="col-lg-3 col-md-6 col-sm-12 col-12">
                    <div class="team-inner-two inner">
                        <div class="thumbnail">
                            <a>
                                <img class="lazy" data-src="{{ ($team->image!==null) ? asset('/images/teams/'.$team->image ):asset('assets/backend/images/users/user-dummy-img.jpg')}}" alt="">
                            </a>
                            @if(!empty(@$team->fb) || !empty(@$team->twitter) || !empty(@$team->linkedin) || !empty(@$team->insta))

                                <div class="social">
                                    @if(!empty(@$team->fb))
                                        <a href="{{@$team->fb}}"><span class="fa-brands fa-facebook"></span></a>
                                    @endif
                                    @if(!empty(@$team->twitter))
                                        <a href="{{$team->twitter}}"><span class="fa-brands fa-twitter"></span></a>
                                    @endif
                                    @if(!empty(@$team->linkedin))
                                        <a href="{{$team->linkedin}}"><span class="fa-brands fa-linkedin"></span></a>
                                    @endif
                                    @if(!empty(@$team->insta))
                                        <a href="{{ $team->insta }}"><span class="fa-brands fa-instagram"></span></a>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <!-- Acquaintance area -->
                        <div class="inner-content">
                            <div class="header">
                                <h5 class="title">{{ucfirst(@$team->name)}}</h5>
                                <span>{{ucfirst(@$team->post)}}</span>
                            </div>
                        </div>
                        <!-- Acquaintance area -->
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
