@extends('site.layouts.master')
@section('content')
<section class="home-slider">
                    <div id="slider">
                        <div class="fullwidthbanner-container">
                            <div id="revolution-slider">
                                <ul>
                                    @if (Config::get('app.locale') == 'en')
                                    @foreach($sliders as $slider)
                                    <li data-transition="random" data-slotamount="7" data-masterspeed="800">
                                        <img src="{{asset('storage/uploads/sliders').'/'.$slider->image}}" alt="">
                                        <div class="tp-caption sfr stt custom-font-2 tp-resizeme"
                                             data-x="300"
                                             data-hoffset="0"
                                             data-y="170"
                                             data-speed="400"
                                             data-start="1000"
                                             data-easing="easeInOut">
                                            {{$slider->head1_en}} <br> {{$slider->head2_en}}
                                        </div>
                                        <div class="tp-caption sfr stb custom-font-4 tp-resizeme"
                                             data-x="300"
                                             data-hoffset="0"
                                             data-y="350"
                                             data-speed="400"
                                             data-start="1400"
                                             data-easing="easeInOut">
                                             {{$slider->content_en}}
                                        </div>
                                        <div class="tp-caption sfr stl tp-resizeme"
                                             data-x="300"
                                             data-hoffset="0"
                                             data-y="410"
                                             data-speed="400"
                                             data-start="1700"
                                             data-easing="easeInOut">
                                            <a class="custom-btn slider-btn tp-resizeme" href="{{URL::to('/services')}}">
                                                {{$data->get('button_en')}}
                                            </a>
                                        </div>
                                    </li>
                                    @endforeach
                                    @else
                                    @foreach($sliders as $slider)
                                    <li data-transition="random" data-slotamount="7" data-masterspeed="800">
                                        <img src="{{asset('storage/uploads/sliders').'/'.$slider->image}}" alt="">
                                        <div class="tp-caption sfr stt custom-font-2 tp-resizeme"
                                             data-x="300"
                                             data-hoffset="0"
                                             data-y="170"
                                             data-speed="400"
                                             data-start="1000"
                                             data-easing="easeInOut">
                                            {{$slider->head1_ar}} <br> {{$slider->head2_ar}}
                                        </div>
                                        <div class="tp-caption sfr stb custom-font-4 tp-resizeme"
                                             data-x="300"
                                             data-hoffset="0"
                                             data-y="350"
                                             data-speed="400"
                                             data-start="1400"
                                             data-easing="easeInOut">
                                             {{$slider->content_ar}}
                                        </div>
                                        <div class="tp-caption sfr stl tp-resizeme"
                                             data-x="300"
                                             data-hoffset="0"
                                             data-y="410"
                                             data-speed="400"
                                             data-start="1700"
                                             data-easing="easeInOut">
                                            <a class="custom-btn slider-btn tp-resizeme" href="{{URL::to('/services')}}">
                                                {{$data->get('button_ar')}}
                                            </a>
                                        </div>
                                    </li>
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div><!--End fullwidthbanner-container-->
                    </div><!--End slider-->
                </section><!--End home-slider-->  
                <div class="page-content">
                    <section class="section-md about">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="section-head">
                                        <span>@if (Config::get('app.locale') == 'en')
                                            Who We Are?
                                            @else
                                            من نحن؟
                                            @endif</span>
                                    </div><!-- End Section-Head -->
                                    <div class="section-content">
                                        <p>
                                            @if (Config::get('app.locale') == 'en')
                                            {{$data->get('about_content_en')}}
                                            @else
                                            {{$data->get('about_content_ar')}}
                                            @endif
                                        </p>
                                        <a href="{{URL::to('/about')}}" class="custom-btn">
                                            @if (Config::get('app.locale') == 'en')
                                            Read More
                                            @else
                                            اقرأ المزيد
                                            @endif
                                        </a>
                                    </div><!-- End Section-Content -->
                                </div><!-- End col -->
                                <div class="col-lg-7">
                                    <div class="section-img">
                                        <div class="about-img">
                                            <img src="{{asset('storage/uploads/statics').'/'.$data->get('about_image1')}}" alt="...">
                                        </div><!-- End Section-Img -->
                                        <div class="about-img has-border">
                                            <img src="{{asset('storage/uploads/statics').'/'.$data->get('about_image2')}}" alt="...">
                                        </div><!-- End Section-Img -->
                                    </div><!-- End About-Img -->
                                </div><!-- End col -->
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </section><!-- End Section -->
                    <section class="section-md categories">
                        <div class="container">
                            <div class="section-head text-center">
                                <h3 class="section-title has-after">
                                    @if (Config::get('app.locale') == 'en')
                                        Our Categories
                                    @else
                                        انواع التأشيرات
                                    @endif
                                </h3>
                            </div><!-- End Section-Head -->
                            <div class="section-content">
                                <div class="row">
                                    @if (Config::get('app.locale') == 'en')
                                    @foreach($cats as $cat)
                                    @if($loop->index < 3)
                                    <div class="col-lg-4">
                                        <div class="widget widget-box">
                                            <div class="widget-head">
                                                <img src="{{asset('storage/uploads/icons').'/'.$cat->image}}" alt="...">
                                            </div><!-- End Widget-Head -->
                                            <div class="widget-content">
                                                <a href="{{ route('site.packages' , ['id' => $cat->cat_id]) }}">
                                                    {{$cat->cat_name_en}}
                                                </a>
                                            </div><!-- End Widget-Content -->
                                        </div><!-- End Widget -->
                                    </div><!-- End col -->
                                    @endif
                                    @endforeach
                                    @else
                                    @foreach($cats as $cat)
                                    @if($loop->index < 3)
                                    <div class="col-lg-4">
                                        <div class="widget widget-box">
                                            <div class="widget-head">
                                                <img src="{{asset('storage/uploads/icons').'/'.$cat->image}}" alt="...">
                                            </div><!-- End Widget-Head -->
                                            <div class="widget-content">
                                                <a href="{{ route('site.packages' , ['id' => $cat->cat_id]) }}">
                                                    {{$cat->cat_name_ar}}
                                                </a>
                                            </div><!-- End Widget-Content -->
                                        </div><!-- End Widget -->
                                    </div><!-- End col -->
                                    @endif
                                    @endforeach
                                    @endif
                                </div><!-- End row -->
                            </div><!-- End Section-content -->
                        </div><!-- End container -->
                    </section><!-- End Section -->
                    <section class="section-md home-trip">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5 home-trip-image">
                                    <div class="swiper-container gallery-top">
                                          <div class="swiper-wrapper">
                                              @foreach($images as $image)
                                              <div class="swiper-slide">
                                                  <img src="{{asset($image->image)}}">
                                              </div>
                                              @endforeach
                                          </div>
                                    </div>
                                </div><!--End col home-trip-image-->
                                <div class="col-lg-6 home-trip-content">
                                    <div class="section-head">
                                        <span>
                                        @if (Config::get('app.locale') == 'en')
                                            why tasherti?    
                                            @else
                                            
                                            لماذا تأشيرتى؟
                                            @endif</span>
                                        <h3 class="section-title">
                                            @if (Config::get('app.locale') == 'en')
                                            {{$data->about('head_en')}}
                                            @else
                                            {{$data->about('head_ar')}}
                                            @endif
                                        </h3>
                                    </div><!-- End Section-Head -->
                                    <div class="section-content">
                                        <p>
                                            @if (Config::get('app.locale') == 'en')
                                            {{$data->about('content_en')}}
                                            @else
                                            {{$data->about('content_ar')}}
                                            @endif
                                        </p>
                                        <a href="{{URL::to('/about')}}" class="custom-btn">
                                            @if (Config::get('app.locale') == 'en')
                                            Read More
                                            @else
                                            اقرأ المزيد
                                            @endif
                                        </a>
                                        <div class="swiper-container gallery-thumbs">
                                            <div class="swiper-wrapper">
                                                @foreach($images as $image)
                                              <div class="swiper-slide">
                                                  <img src="{{asset($image->image)}}">
                                              </div>
                                              @endforeach
                                            </div>
                                        </div>
                                    </div><!-- End Section-Content -->
                                </div><!-- End col -->
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </section><!-- End Section -->
                    <section class="section-md packages">
                        <div class="container">
                            <div class="section-head text-center">
                                <h3 class="section-title has-after">
                                  @if (Config::get('app.locale') == 'en')
                                      Our Packages
                                  @else
                                      الباقات
                                  @endif
                                </h3>
                                <ul id="filters" class="filters">
                                    <li class="active">
                                        <a href="#" data-filter="*" class="selected">
                                          @if (Config::get('app.locale') == 'en')
                                              All Packages
                                          @else
                                              كل الباقات
                                          @endif
                                        </a>
                                    </li>
                                    @foreach($cats as $cat)
                                    <li>
                                        <a href="#" data-filter=".{{$cat->value}}">
                                          @if (Config::get('app.locale') == 'en')
                                              {{$cat->cat_name_en}}
                                          @else
                                              {{$cat->cat_name_ar}}
                                          @endif
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div><!-- End Section-Head -->
                            <div class="section-content">
                                <div class="row">
                                    <ul id="gallery" class="gallery sort-destination">
                                      @foreach($packages as $pack)
                                      @if($loop->index < 4)
                                        <li class="isotope-item {{$pack->value}}">
                                            <div class="box-item">
                                                <div class="box-item-img">
                                                    <img src="{{asset('storage/uploads/packages').'/'.$pack->image}}" alt="package image">
                                                </div>
                                                <div class="box-item-content">
                                                    <div class="trip-head">
                                                        <div class="price">
                                                            <span>${{$pack->price}} </span>
                                                            <span>/per person</span>
                                                        </div>
                                                        <a href="{{ route('site.package' , ['id' => $pack->pack_id]) }}" class="title title-lg">
                                                          @if (Config::get('app.locale') == 'en')
                                                              {{$pack->pack_name_en}}
                                                          @else
                                                              {{$pack->pack_name_ar}}
                                                          @endif
                                                        </a>
                                                        <ul class="rating-list">
                                                            @for ($i = 1; $i <= $pack->rate; $i++)
                                                              <li>
                                                                <i class="fa fa-star"></i>
                                                              </li>
                                                            @endfor
                                                        </ul><!-- End Rating-List -->
                                                    </div><!-- End Trip-Head -->
                                                    <div class="trip-body">
                                                        <p>
                                                          @if (Config::get('app.locale') == 'en')
                                                            @php
                                                            $brief = substr($pack->content_en, 0, 200);
                                                            @endphp
                                                            {{strip_tags($brief)}}...
                                                          @else
                                                            @php
                                                            $brief = substr($pack->content_ar, 0, 200);
                                                            @endphp
                                                            {{strip_tags($brief)}}...
                                                          @endif
                                                        </p>
                                                    </div><!-- End Trip-Body -->
                                                    <a href="{{ route('site.package' , ['id' => $pack->pack_id]) }}" class="custom-btn">
                                                      @if (Config::get('app.locale') == 'en')
                                                          Read More
                                                      @else
                                                          اقرأ المزيد
                                                      @endif
                                                    </a>
                                                </div><!--End Box-item-content-->
                                            </div>
                                        </li>
                                        @endif
                                        @endforeach
                                    </ul>                       
                                </div>
                            </div><!-- End Section-Content -->
                        </div><!-- End container -->
                    </section><!-- End Section -->
<!--
                    
                    <section class="section-md testmonials">
                        <div class="container">
                            <div class="section-head text-center">
                                <h3 class="section-title has-after">
                                  @if (Config::get('app.locale') == 'en')
                                      Clients Stories
                                  @else
                                      قصص النجاح
                                  @endif
                                </h3>
                            </div>
                            <div class="section-content">
                                <div id="testimonial-1" class="owl-carousel">
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
                                        </div>
                                        <div class="owner-info">
                                            <div class="owner-img">
                                                <img src="{{asset('storage/uploads/stories').'/'.$story->image}}" alt="...">
                                            </div>
                                            <h3 class="title">
                                              @if (Config::get('app.locale') == 'en')
                                                    {{$story->name_en}}
                                                @else
                                                    {{$story->name_ar}}
                                                @endif
                                              </h3>
                                            <span>@if (Config::get('app.locale') == 'en')
                                                    {{$story->position_en}}
                                                @else
                                                    {{$story->position_ar}}
                                                @endif</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                    -->
                </div><!--End page-content-->
@endsection