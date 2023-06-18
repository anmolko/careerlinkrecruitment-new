
@extends('frontend.layouts.master')
@section('title') Contact Us @endsection
@section('css')
@endsection
@section('content')
    <div class="rts-breadcrumb-area breadcrumb-bg bg_image">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 breadcrumb-1">
                    <h1 class="title">Contact</h1>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="bread-tag">
                        <a href="/">Home</a>
                        <span> / </span>
                        <a href="#" class="active">Contact us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="rts-map-area bg-light-white rts-section-gap">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <!-- map area left -->
                    <div class="mapdetails-inner-one inner">
                        <div class="left-area single-wized">
                            <h5 class="title">Get in touch</h5>
                            <div class="details">
                                <p>Work and general inquiries</p>
                                <a class="number" href="#">{{@$setting_data->phone}}</a>

                                <p class="time-header">
                                    Contact number:
                                </p>
                                <p class="time">
                                    {{@$setting_data->mobile}}
                                </p>
                            </div>
                        </div>
                        <div class="right-area single-wized">
                            <h5 class="title">Post Address</h5>
                            <div class="details">
                                <p>Office</p>
                                <a href="#">{{@$setting_data->address}}</a>

                                <p class="headoffice">
                                    Email
                                </p>
                                <p class="office">{{@$setting_data->email}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- map area right -->
                </div>
            </div>

        </div>
    </div>

    <div class="rts-contact-form-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="rts-contact-fluid rts-section-gap">
                        <div class="rts-title-area contact-fluid text-center mb--50">
                            <p class="pre-title">
                                Get In Touch
                            </p>
                            <h2 class="title">Need Help? Let’s Get in Touch</h2>
                        </div>
                        <div class="form-wrapper">
                            <div id="form-messages"></div>
                            <form id="contact-forms" name="contact" class="" action="{{route('contact.store')}}" method="post">
                                @csrf
                                <div class="name-email">
                                    <input type="text" name="name" placeholder="Your Name" required>
                                    <input type="email" name="email" placeholder="Email Address" required>
                                </div>
                                <div class="name-email">
                                    <input type="text" name="phone" placeholder="Your phone number" required>
                                    <input type="text" name="subject" placeholder="Your Subject">
                                </div>
                                <textarea placeholder="Type Your Message" name="message"></textarea>
                                <button type="submit" class="rts-btn btn-primary">Send Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(@$setting_data->google_map)

        <div class="rts-contact-map-area">
            <div class="contaciner-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="contact-map-area-fluid">
                            <iframe class="contact-map" src="{{@$setting_data->google_map}}"
                                    style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection
@section('js')
    <!-- For Contact Form -->
    <script src="{{asset('assets/frontend/js/contact.form.js')}}"></script>

    @include('frontend.partials.toast_alert')

@endsection
