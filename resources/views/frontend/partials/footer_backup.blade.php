<div class="rts-footer-area footer-one rts-section-gapTop bg-footer-one mt_md--80 mt_sm--60">
    <div class="container">
        <div class="row">
            <!-- single wized -->
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="footer-one-single-wized">
                    <a href="/" class="logo_footer">
                        <img class="lazy"
                             data-src="{{ (@$setting_data->logo_white) ? asset('/images/settings/'.@$setting_data->logo_white): asset('/images/settings/'.@$setting_data->logo) }}"
                             alt=""/>
                    </a>
                    <p class="disc">
                        {!! ucfirst(@$setting_data->website_description ?? '') !!}
                    </p>
                    <ul class="social-three-wrapper">
                        @if(@$setting_data->facebook)
                            <li><a href="{{@$setting_data->facebook}}"><span class="fa-brands fa-facebook"></span></a></li>
                        @endif
                        @if(@$setting_data->youtube)
                            <li><a href="{{@$setting_data->youtube}}"><span class="fa-brands fa-youtube"></span></a></li>

                        @endif
                        @if(@$setting_data->instagram)
                            <li><a href="{{@$setting_data->instagram}}"><span class="fa-brands fa-instagram"></span></a></li>

                        @endif
                        @if(@$setting_data->linkedin)
                            <li><a href="{{@$setting_data->linkedin}}"><span class="fa-brands fa-linkedin"></span></a></li>
                        @endif
                        @if(!empty(@$setting_data->ticktock))
                            <li><a href="{{@$setting_data->ticktock}}"><span class="fa-brands fa-tiktok"></span></a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mt_sm--50">
                <div class="footer-one-single-wized">
                    <div class="wized-title-area" style="padding-left: 35px;">
                        <h5 class="wized-title text-white">{{ $footer_nav_title1 ?? '' }}</h5>
                        <img class="lazy" data-src="{{asset('assets/frontend/images/footer/under-title.png')}}" alt="footer">
                    </div>
                    <div class="wized-2-body">
                        @if($footer_nav_data1!==null)
                            <ul class="pl-0">
                                @foreach(@$footer_nav_data1 as $nav)
                                    @if(empty(@$nav->children[0]))
                                        <li>
                                            <a href="{{get_menu_url(@$nav->type, @$nav)}}" target="{{@$nav->target ? '_blank':''}}">
                                                <i class="fal fa-chevron-double-right"></i>
                                                {{ @$nav->name ?? @$nav->title ?? ''}}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
            <!-- single wized -->
            <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 col-12 mt_sm--30 mt_md--30">
                <div class="footer-one-single-wized">
                    <div class="wized-title-area">
                        <h5 class="wized-title text-white">Contact Us</h5>
                        <img class="lazy" data-src="{{asset('assets/frontend/images/footer/under-title.png')}}" alt="footer">
                    </div>
                    <div class="wized-body">
                        <div class="contact-info-1">
                            <div class="icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="disc">
                                <span>Call Us </span>
                                <a class="text-white" href="tel:{{@$setting_data->phone ?? $setting_data->mobile ?? ''}}">
                                    {{@$setting_data->phone ?? $setting_data->mobile ?? ''}}</a>
                            </div>
                        </div>
                        <div class="contact-info-1">
                            <div class="icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="disc">
                                <span>Work with us</span>
                                <a  class="text-white" href="mailto:{{@$setting_data->email ?? ''}}">
                                    {{@$setting_data->email ?? ''}}
                                </a>
                            </div>
                        </div>
                        <div class="contact-info-1">
                            <div class="icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="disc">
                                <span>Our Location</span>
                                <a class="text-white" href="mailto:{{@$setting_data->email ?? ''}}">{{@$setting_data->address ?? ''}}</a>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- single wized -->
            <div class="col-xl-4 col-md-6 col-sm-12 col-12">
                <div class="footer-one-single-wized six margin-left-65">
                    <div class="wized-title">
                        <h5 class="title">Popular Updates</h5>
                        <img class="lazy" data-src="{{asset('assets/frontend/images/footer/under-title.png')}}" alt="footer">
                    </div>
                    <div class="post-wrapper">
                        @foreach(@$footer_jobs as $index=>$job)
                            <div class="single-footer-post mb--30">
                                <div class="left-thumbnail">
                                    <img class="lazy" data-src="{{ ($job->image !== null) ? asset('/images/job/thumb/thumb_'.@$job->image): asset('assets/frontend/images/space.png')}}" alt="post">
                                </div>
                                <div class="post-right">
                                    <p> <i class="fal fa-clock"></i>
                                        @if(@$job->end_date >= $today)
                                            {{date('M j, Y',strtotime(@$job->end_date))}}
                                        @else
                                            Expired
                                        @endif
                                    </p>
                                    <a href="{{route('job.single',@$job->slug)}}">
                                        <h6 class="title">{{ucfirst($job->name)}}</h6>
                                    </a>
                                    <a class="red-more" href="{{route('job.single',@$job->slug)}}">Read More<i class="far fa-arrow-right"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- single wized -->
        </div>
    </div>

    <div class="rts-copyright-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <p> &copy; {{date("Y")}} {{$setting_data->website_name ?? 'Careerlink'}} by <a href="https://www.canosoft.com.np/" target="_blank">Canosoft Techonology</a> All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- start loader -->
<div class="loader-wrapper">
    <div class="loader">
    </div>
    <div class="loader-section section-left"></div>
    <div class="loader-section section-right"></div>
</div>
<!-- End loader -->

<!-- progress Back to top -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- progress Back to top End -->


<!-- scripts start form hear -->
<script src="{{ asset('assets/frontend/js/vendor/jquery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/jqueryui.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/waypoint.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/swiper.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/counterup.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/sal.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/plugins/contact.form.js') }}"></script>
<!-- main Js -->
<script src="{{ asset('assets/frontend/js/main.js') }}"></script>
<script src="{{ asset('assets/common/lazyload.js') }}"></script>
</body>
@yield('js')
@stack('scripts')
</html>
