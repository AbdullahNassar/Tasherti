@extends('site.layouts.master')
@section('content')
                <div class="page-header">
                    <div class="page-header-img">
                        <img src="{{asset('assets/site/images/page-head-bg.jpg')}}">
                    </div><!-- End Page-Header-Img -->
                    <div class="container">
                        <h3 class="page-header-title">
                            @if (Config::get('app.locale') == 'en')
                            About Us
                            @else
                            من نحن
                            @endif
                        </h3>
                    </div><!-- End container -->
                </div><!-- End Page-Header -->
                <div class="page-content">
                    <section class="section-md about style-2">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="section-head">
                                        <span>@if (Config::get('app.locale') == 'en')
                                                About Us
                                                @else
                                                من نحن
                                                @endif
                                        </span>
                                    </div><!-- End Section-Head -->
                                    <div class="section-content">
                                        <p>
                                            @if (Config::get('app.locale') == 'en')
                                            {{$data->get('about_content_en')}}
                                            @else
                                            {{$data->get('about_content_ar')}}
                                            @endif
                                        </p>
                                    </div><!-- End Section-Content -->
                                </div><!-- End col -->
                                <div class="col-lg-7">
                                    <div class="section-img">
                                        <div class="about-img">
                                            <img src="{{asset('storage/uploads/statics').'/'.$data->get('about_image2')}}" alt="...">
                                        </div><!-- End Section-Img -->
                                        <div class="about-img has-border">
                                            <img src="{{asset('storage/uploads/statics').'/'.$data->get('about_image1')}}" alt="...">
                                        </div><!-- End About-Img -->
                                        <div class="absolute-img">
                                            <img src="{{asset('assets/site/images/about-fly.png')}}">
                                        </div><!-- End Absolute-Img -->
                                    </div><!-- End Section-Img -->
                                </div><!-- End col -->
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </section><!-- End Section -->
                    <section class="why-us">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="section-img">
                                        <img src="{{asset('storage/uploads/statics').'/'.$data->get('why_image')}}" alt="...">
                                    </div><!-- End Section-Img -->
                                </div><!-- End col -->
                                <div class="col-lg-8 section-content">
                                    <div class="section-head">
                                        <h3 class="section-title has-after">
                                            @if (Config::get('app.locale') == 'en')
                                                Why Us
                                                @else
                                                لماذا نحن
                                                @endif
                                            
                                        </h3>
                                        <p>
                                            @if (Config::get('app.locale') == 'en')
                                            {{$data->get('why_en')}}
                                            @else
                                            {{$data->get('why_ar')}}
                                            @endif
                                        </p>
                                    </div><!-- End Section-Head -->
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="icon-box">
                                                <div class="icon-box-head">
                                                    <i class="fa fa-check"></i>
                                                </div><!-- End Icon-Box-Head-->
                                                <div class="icon-box-body">
                                                    <h2 class="title title-sm">
                                                        @if (Config::get('app.locale') == 'en')
                                                        {{$data->get('block1_en')}}
                                                        @else
                                                        {{$data->get('block1_ar')}}
                                                        @endif
                                                    </h2>
                                                    <p>
                                                        @if (Config::get('app.locale') == 'en')
                                                        {{$data->get('b1_content_en')}}
                                                        @else
                                                        {{$data->get('b1_content_ar')}}
                                                        @endif
                                                    </p>
                                                </div><!--End Icon-Box-Body-->
                                            </div><!--End Icon-widget-->
                                        </div><!--End Col-md-6-->
                                        <div class="col-lg-6">
                                            <div class="icon-box">
                                                <div class="icon-box-head">
                                                    <i class="fa fa-check"></i>
                                                </div><!-- End Icon-Box-Head-->
                                                <div class="icon-box-body">
                                                    <h2 class="title title-sm">
                                                        @if (Config::get('app.locale') == 'en')
                                                        {{$data->get('block2_en')}}
                                                        @else
                                                        {{$data->get('block2_ar')}}
                                                        @endif
                                                    </h2>
                                                    <p>
                                                        @if (Config::get('app.locale') == 'en')
                                                        {{$data->get('b2_content_en')}}
                                                        @else
                                                        {{$data->get('b2_content_ar')}}
                                                        @endif
                                                    </p>
                                                </div><!--End Icon-Box-Body-->
                                            </div><!--End Icon-widget-->
                                        </div><!--End Col-md-6-->
                                        <div class="col-lg-6">
                                            <div class="icon-box">
                                                <div class="icon-box-head">
                                                    <i class="fa fa-check"></i>
                                                </div><!-- End Icon-Box-Head-->
                                                <div class="icon-box-body">
                                                    <h2 class="title title-sm">
                                                        @if (Config::get('app.locale') == 'en')
                                                        {{$data->get('block3_en')}}
                                                        @else
                                                        {{$data->get('block3_ar')}}
                                                        @endif
                                                    </h2>
                                                    <p>
                                                        @if (Config::get('app.locale') == 'en')
                                                        {{$data->get('b3_content_en')}}
                                                        @else
                                                        {{$data->get('b3_content_ar')}}
                                                        @endif
                                                    </p>
                                                </div><!--End Icon-Box-Body-->
                                            </div><!--End Icon-widget-->
                                        </div><!--End Col-md-6-->
                                        <div class="col-lg-6">
                                            <div class="icon-box">
                                                <div class="icon-box-head">
                                                    <i class="fa fa-check"></i>
                                                </div><!-- End Icon-Box-Head-->
                                                <div class="icon-box-body">
                                                    <h2 class="title title-sm">
                                                        @if (Config::get('app.locale') == 'en')
                                                        {{$data->get('block4_en')}}
                                                        @else
                                                        {{$data->get('block4_ar')}}
                                                        @endif
                                                    </h2>
                                                    <p>
                                                        @if (Config::get('app.locale') == 'en')
                                                        {{$data->get('b4_content_en')}}
                                                        @else
                                                        {{$data->get('b4_content_ar')}}
                                                        @endif
                                                    </p>
                                                </div><!--End Icon-Box-Body-->
                                            </div><!--End Icon-widget-->
                                        </div><!--End Col-md-6-->
                                    </div>
                                </div><!-- End col -->
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </section><!-- End Section -->
                    <section class="section-md testmonials style-2">
                        <div class="container">
                            <div class="section-head text-center">
                                <h3 class="section-title has-after">
                                    @if (Config::get('app.locale') == 'en')
                                      Clients Stories
                                  @else
                                      قصص النجاح
                                  @endif
                                </h3>
                            </div><!-- End Section-Head -->
                            <div class="section-content">
                                <div id="testimonial-2" class="owl-carousel">
                                    @foreach($stories as $story)
                                    <div class="item">
                                        <div class="comment">
                                            <p>
                                                @if (Config::get('app.locale') == 'en')
                                                    {{$story->content_en}}
                                                @else
                                                    {{$story->content_ar}}
                                                @endif
                                            </p>
                                        </div><!-- End Comment -->
                                        <div class="owner-info">
                                            <div class="owner-img">
                                                <img src="{{asset('storage/uploads/stories').'/'.$story->image}}" alt="...">
                                            </div>
                                            <h3 class="title">@if (Config::get('app.locale') == 'en')
                                                    {{$story->name_en}}
                                                @else
                                                    {{$story->name_ar}}
                                                @endif</h3>
                                            <span>@if (Config::get('app.locale') == 'en')
                                                    {{$story->position_en}}
                                                @else
                                                    {{$story->position_ar}}
                                                @endif</span>
                                        </div><!-- End Owner-Info -->
                                    </div><!-- End Item -->
                                    @endforeach
                                </div><!--End owl-carousel-->
                            </div><!-- End Section-Content -->
                        </div><!-- End container -->
                    </section><!-- End Section -->
                    <section class="section-md gallery style-2">
                        <div class="container">
                            <div class="section-head text-center">
                                <h3 class="section-title has-after">
                                    @if (Config::get('app.locale') == 'en')
                                        Our Gallery
                                    @else
                                        معرض الصور
                                    @endif
                                </h3>
                            </div><!-- End Section-Head -->
                            <div class="section-content">
                                <div id="gallery-2" class="owl-carousel">
                                    @foreach($gallery as $g)
                                    <div class="item">
                                        <div class="widget gallary-item">
                                            <a href="{{asset('storage/uploads/gallery').'/'.$g->image}}" rel="prettyPhoto[myGallery]">
                                                <img src="{{asset('storage/uploads/gallery').'/'.$g->image}}" alt="gallary-img"/>
                                                <div class="gallary-item-content">
                                                    <a href="#">
                                                        @if (Config::get('app.locale') == 'en')
                                                              {{$g->name_en}}
                                                          @else
                                                              {{$g->name_ar}}
                                                          @endif
                                                    </a>
                                                </div><!-- End Gallary-Item-Content -->
                                            </a>
                                        </div><!-- End Gallary-Item -->
                                    </div><!-- End Item -->
                                    @endforeach
                                </div><!--End owl-carousel-->
                            </div><!-- End Section-Content -->
                        </div><!-- End container -->
                    </section><!-- End Section -->
                </div><!--End page-content-->  
@endsection