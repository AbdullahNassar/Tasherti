@extends('site.layouts.master')
@section('content')
                <div class="page-header">
                    <div class="page-header-img">
                        <img src="{{asset('assets/site/images/page-head-bg.jpg')}}">
                    </div><!-- End Page-Header-Img -->
                    <div class="container">
                        <h3 class="page-header-title">
                            @if (Config::get('app.locale') == 'en')
                            Contact Us
                            @else
                            اتصل بنا
                            @endif
                        </h3>
                    </div><!-- End container -->
                </div><!-- End Page-Header -->
                <div class="page-content">
                    <section class="section-md contact">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="section-head">
                                        <h3 class="section-title has-after">
                                            @if (Config::get('app.locale') == 'en')
                                            Get in touch with us
                                            @else
                                            تواصل معنا
                                            @endif
                                        </h3>
                                        <p>
                                            @if (Config::get('app.locale') == 'en')
                                                {{$data->get('contact_en')}}
                                            @else
                                                {{$data->get('contact_ar')}}
                                            @endif
                                        </p>
                                    </div><!-- End Section-Head -->
                                </div><!-- End col -->
                            </div><!-- End row -->
                            <div class="section-content">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="contact-info">
                                            <div class="contact-widget">
                                                <div class="contact-widget-head">
                                                    <img src="{{asset('assets/site/images/icons/phone.png')}}">
                                                </div><!-- End Contact-Widget-Head -->
                                                <div class="contact-widget-body">
                                                    <span>@if (Config::get('app.locale') == 'en')
                                                        Contact Us
                                                        @else
                                                        اتصل بنا
                                                        @endif</span>
                                                    <span>{{$contact->get('phone')}}</span>
                                                </div><!-- End Contact-Widget-Body -->
                                            </div><!-- End Contact-Widget -->
                                            <div class="contact-widget">
                                                <div class="contact-widget-head">
                                                    <img src="{{asset('assets/site/images/icons/mail.png')}}">
                                                </div><!-- End Contact-Widget-Head -->
                                                <div class="contact-widget-body">
                                                    <span>
                                                        @if (Config::get('app.locale') == 'en')
                                                        Email Us
                                                        @else
                                                        البريد الالكترونى
                                                        @endif
                                                    </span>
                                                    <span>{{$contact->get('email')}}</span>
                                                </div><!-- End Contact-Widget-Body -->
                                            </div><!-- End Contact-Widget -->
                                            <div class="contact-widget">
                                                <div class="contact-widget-head">
                                                    <img src="{{asset('assets/site/images/icons/marker.png')}}">
                                                </div><!-- End Contact-Widget-Head -->
                                                <div class="contact-widget-body">
                                                    <span>
                                                        @if (Config::get('app.locale') == 'en')
                                                        Reach Us
                                                        @else
                                                        العنوان
                                                        @endif
                                                    </span>
                                                    <span>@if (Config::get('app.locale') == 'en')
                                                            {{$contact->get('address_en')}}
                                                        @else
                                                            {{$contact->get('address_ar')}}
                                                        @endif</span>
                                                </div><!-- End Contact-Widget-Body -->
                                            </div><!-- End Contact-Widget -->
                                        </div><!-- End Contact-Info -->
                                    </div><!-- End col -->
                                    <div class="col-lg-8">
                                        <div class="contact-form">
                                            <form action="{{route('site.message')}}" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                            {{ csrf_field() }}
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="@if (Config::get('app.locale') == 'en') Full Name @else الاسم بالكامل @endif" name="name">
                                                        </div><!-- End Form-Group -->
                                                    </div><!-- End col -->
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control" placeholder=" @if (Config::get('app.locale') == 'en') Email Address @else البريد الالكترونى @endif" name="email">
                                                        </div><!-- End Form-Group -->
                                                    </div><!-- End col -->
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="@if (Config::get('app.locale') == 'en') Phone Number @else رقم الهاتف @endif" name="phone">
                                                        </div><!-- End Form-Group -->
                                                    </div><!-- End col -->
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="@if (Config::get('app.locale') == 'en') Subject @else الموضوع @endif" name="subject">
                                                        </div><!-- End Form-Group -->
                                                    </div><!-- End col -->
                                                    <div class="col-lg-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control" placeholder=" @if (Config::get('app.locale') == 'en') Message @else الرسالة @endif" rows="6" name="message"></textarea>
                                                        </div><!-- End Form-Group -->
                                                    </div><!-- End col -->
                                                    <div class="col-lg-12">
                                                        <button type="submit" class="custom-btn addBTN">@if (Config::get('app.locale') == 'en') Send @else ارسل @endif</button>
                                                    </div><!-- End col -->
                                                </div><!-- End row -->
                                            </form><!-- End Form -->
                                        </div><!-- End Contact-Form -->
                                    </div><!-- End col -->
                                </div><!-- End row -->
                            </div><!-- End Section-Content -->
                            
                        </div><!-- End container -->
                    </section><!-- End Section -->
                    <div class="map-wrap">
                        <div id="map"></div>
                    </div><!--End map-wrap-->
                </div><!--End page-content-->  
@endsection