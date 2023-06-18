<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ucwords(@$setting_data->meta_description ?? 'Careerlink')}} "/>
    <meta name="keywords" content="{{@$setting_data->meta_tags ?? 'Careerlink'}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="canonical" href="https://spacehrsolution.com" />

    @if (\Request::is('/'))
        <title>{{ucwords(@$setting_data->website_name ?? 'Careerlink')}}</title>
    @else
        <title>@yield('title') | {{ucwords(@$setting_data->website_name ?? 'Careerlink')}} </title>
    @endif

    <meta property="og:title" content=" {{ucwords(@$setting_data->meta_title ?? 'Careerlink')}}" />
    <meta property="og:type" content="Consultancy" />
    <meta property="og:url" content="https://spacehrsolution.com/" />
    <meta property="og:site_name" content="Careerlink" />
    <meta property="og:description" content=" {{ucwords(@$setting_data->meta_description ?? 'Careerlink')}}" />

    <link rel="shortcut icon" type="image/x-icon" href="{{ (@$setting_data->favicon) ? asset('/images/settings/'.@$setting_data->favicon):asset('assets/backend/images/canosoft-favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('assets/frontend/css/plugins/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/plugins/fontawesome-5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/plugins/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/plugins/unicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{@$setting_data->google_analytics}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{@$setting_data->google_analytics}}');
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('css')
    @stack('styles')
</head>

<body>

<!-- start header area -->
<!-- start header area -->
<header class="header--sticky header-one ">
    <div class="header-top header-top-one bg-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-xl-block d-none">
                    <div class="left">
                        <div class="mail">
                            <a href="mailto:{{@$setting_data->email ?? ''}}"><i class="fal fa-envelope"></i> {{@$setting_data->email ?? ''}}</a>
                        </div>
                        <div class="working-time mail">
                            <a href="tel:{{@$setting_data->phone ?? $setting_data->mobile ?? ''}}"><i class="fal fa-phone-alt"></i> {{@$setting_data->phone ?? $setting_data->mobile  ?? ''}}</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-xl-block d-none">
                    <div class="right">
                        <ul class="top-nav">
                            <li><a href="{{ route('blog.frontend') }}">News</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                        <ul class="social-wrapper-one">
                            @if(@$setting_data->facebook)
                                <li>
                                    <a href="{{@$setting_data->facebook}}">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                </li>
                            @endif
                            @if(@$setting_data->youtube)
                                <li>
                                    <a href="{{@$setting_data->youtube}}">
                                        <i class="fa-brands fa-youtube"></i>
                                    </a>
                                </li>
                            @endif
                            @if(@$setting_data->instagram)
                                <li><a href="{{@$setting_data->instagram}}">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a></li>
                            @endif
                            @if(@$setting_data->linkedin)
                                <li><a href="{{@$setting_data->linkedin}}">
                                        <i class="fa-brands fa-linkedin"></i>
                                    </a>
                                </li>
                            @endif
                            @if(!empty(@$setting_data->ticktock))
                                <li>
                                    <a href="{{@$setting_data->ticktock}}">
                                        <i class="fa-brands fa-tiktok"></i>
                                    </a>
                                </li>
                            @endif
{{--                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>--}}
{{--                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>--}}
{{--                            <li><a href="#"><i class="fab fa-instagram"></i></a></li>--}}
{{--                            <li><a class="mr--0" href="#"><i class="fab fa-linkedin-in"></i></a></li>--}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-main-one bg-white">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-4">
                    <div class="thumbnail">
                        <a href="/">
                            <img src="{{$setting_data->logo ? asset('/images/settings/'.@$setting_data->logo):''}}" style=" width: 250px;" alt="">
                        </a>
                    </div>
                </div>
                <div class=" col-xl-9 col-lg-8 col-md-8 col-sm-8 col-8">
                    <div class="main-header">
                        <nav class="nav-main mainmenu-nav d-none d-xl-block">
                            <ul class="mainmenu">
                                <li><a class="nav-item" href="/">Home</a></li>
                                @if(!empty($top_nav_data))
                                    @foreach($top_nav_data as $nav)
                                        @if(!empty($nav->children[0]))
                                            <li class="has-droupdown">
                                                <a class="nav-link" href="#">{{ @$nav->name ?? @$nav->title }}</a>
                                                <ul class="submenu menu-link3">
                                                    @foreach($nav->children[0] as $childNav)
                                                        <li class="{{!empty($childNav->children[0]) ? 'sub-droupdown':''}}">
                                                            <a class="sub-menu-link" href="{{get_menu_url($childNav->type, $childNav)}}"
                                                               target="{{@$childNav->target ? '_blank':''}}">
                                                                {{ @$childNav->name ?? @$childNav->title ??''}}
                                                            </a>
                                                            @if(!empty($childNav->children[0]))
                                                                <ul class="submenu third-lvl">
                                                                    @foreach($childNav->children[0] as $key => $lastchild)
                                                                        <li><a href="{{get_menu_url($lastchild->type, $lastchild)}}" target="{{@$lastchild->target ? '_blank':''}}">
                                                                                {{ @$lastchild->name ?? @$lastchild->title ?? ''}}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            @endif
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @else
                                            <li>
                                                <a class="nav-item" href="{{get_menu_url(@$nav->type, @$nav)}}" target="{{@$nav->target ? '_blank':''}}">
                                                    {{ @$nav->name ?? @$nav->title ??''}}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </nav>
                        <div class="button-area">
                            <button id="search" class="rts-btn btn-primary-alta"><i class="fa fa-search"></i></button>
                            <a href="{{ route('contact') }}" class="rts-btn btn-primary ml--20 ml_sm--5 header-one-btn quote-btn">Get Quote</a>
                            <button id="menu-btn" class="menu rts-btn btn-primary-alta ml--20 ml_sm--5">
                                <img class="menu-dark lazy" data-src="{{ asset('assets/frontend/images/icon/menu.png') }}" alt="Menu-icon">
                                <img class="menu-light lazy" data-src="{{ asset('assets/frontend/images/icon/menu-light.png') }}" alt="Menu-icon">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End header area -->

<div id="side-bar" class="side-bar">
    <button class="close-icon-menu"><i class="fa fa-times"></i></button>
    <!-- inner menu area desktop start -->
    <div class="rts-sidebar-menu-desktop">
        <a class="logo-1" href="/"><img class="logo lazy" data-src="{{$setting_data->logo ? asset('/images/settings/'.@$setting_data->logo):''}}" alt=""></a>
        <div class="body d-none d-xl-block">
            <p class="disc">
                {{ $setting_data->website_description ?? '' }}
            </p>
            <div class="get-in-touch">
                <!-- title -->
                <div class="h6 title">Get In Touch</div>
                <!-- title End -->
                <div class="wrapper">
                    <!-- single -->
                    <div class="single">
                        <i class="fas fa-phone-alt"></i>
                        <a href="tel:{{@$setting_data->phone ?? $setting_data->mobile ?? ''}}">{{@$setting_data->phone ?? $setting_data->mobile ?? ''}}</a>
                    </div>
                    <!-- single ENd -->
                    <!-- single -->
                    <div class="single">
                        <i class="fas fa-envelope"></i>
                        <a href="mailto:{{@$setting_data->email ?? ''}}">{{@$setting_data->email ?? ''}}</a>
                    </div>
                    <!-- single -->
                    <div class="single">
                        <i class="fas fa-map-marker-alt"></i>
                        <a href="mailto:{{@$setting_data->email ?? ''}}">{{@$setting_data->address ?? ''}}</a>
                    </div>
                    <!-- single ENd -->
                </div>
                <div class="social-wrapper-two menu">
                    @if(@$setting_data->facebook)
                        <a href="{{@$setting_data->facebook}}">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                    @endif
                    @if(@$setting_data->youtube)
                        <a href="{{@$setting_data->youtube}}">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    @endif
                    @if(@$setting_data->instagram)
                        <a href="{{@$setting_data->instagram}}">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    @endif
                    @if(@$setting_data->linkedin)
                        <a href="{{@$setting_data->linkedin}}">
                                <i class="fa-brands fa-linkedin"></i>
                        </a>
                    @endif
                    @if(!empty(@$setting_data->ticktock))
                        <a href="{{@$setting_data->ticktock}}">
                            <i class="fa-brands fa-tiktok"></i>
                        </a>
                    @endif
                </div>
            </div>
        </div>
        <div class="body-mobile d-block d-xl-none">
            <nav class="nav-main mainmenu-nav">
                <ul class="mainmenu">
                    <li class="menu-item menu-item"><a class="menu-link" href="/">Home</a></li>
                    @if(!empty($top_nav_data))
                        @foreach($top_nav_data as $nav)
                            @if(!empty($nav->children[0]))
                                <li class="has-droupdown menu-item">
                                    <a class="menu-link" href="#">{{ @$nav->name ?? @$nav->title }}</a>
                                    <ul class="submenu">
                                        @foreach($nav->children[0] as $childNav)
                                            <li class="has-droupdown {{!empty($childNav->children[0]) ? 'sub-droupdown':''}}">
                                                <a href="{{get_menu_url($childNav->type, $childNav)}}" target="{{@$childNav->target ? '_blank':''}}">
                                                    {{ @$childNav->name ?? @$childNav->title ??''}}
                                                    @if(!empty($childNav->children[0]))
                                                        <ul class="submenu third-lvl mobile-menu">
                                                            @foreach($childNav->children[0] as $key => $lastchild)
                                                                <li>
                                                                    <a href="{{get_menu_url($lastchild->type, $lastchild)}}" target="{{@$lastchild->target ? '_blank':''}}">
                                                                        {{ @$lastchild->name ?? @$lastchild->title ?? ''}}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="menu-item menu-item">
                                    <a class="menu-link" href="{{get_menu_url(@$nav->type, @$nav)}}" target="{{@$nav->target ? '_blank':''}}">
                                        {{ @$nav->name ?? @$nav->title ??''}}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </nav>
            <div class="social-wrapper-two menu mobile-menu">
                @if(@$setting_data->facebook)
                    <a href="{{@$setting_data->facebook}}">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                @endif
                @if(@$setting_data->youtube)
                    <a href="{{@$setting_data->youtube}}">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                @endif
                @if(@$setting_data->instagram)
                    <a href="{{@$setting_data->instagram}}">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                @endif
                @if(@$setting_data->linkedin)
                    <a href="{{@$setting_data->linkedin}}">
                        <i class="fa-brands fa-linkedin"></i>
                    </a>
                @endif
                @if(!empty(@$setting_data->ticktock))
                    <a href="{{@$setting_data->ticktock}}">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                @endif
            </div>
            <a href="{{ route('contact') }}" class="rts-btn btn-primary ml--20 ml_sm--5 header-one-btn quote-btnmenu">Get Quote</a>
        </div>
    </div>
    <!-- inner menu area desktop End -->
</div>

<div class="search-input-area">
    <div class="container">
        <div class="search-input-inner">
            <div class="input-div">
                <form method="get" id="searchform" action="{{route('searchJob')}}">
                    <input class="search-input" id="s" name="s" type="text" placeholder="Search for jobs.." oninvalid="this.setCustomValidity('Type a keyword')" oninput="this.setCustomValidity('')" required>
                    <button><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
    <div id="close" class="search-close-icon"><i class="fa fa-times"></i></div>
</div>

<div id="anywhere-home">
</div>
<!-- ENd Header Area -->
