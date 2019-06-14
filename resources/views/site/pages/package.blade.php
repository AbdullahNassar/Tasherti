@extends('site.layouts.master')
@section('content')
@foreach($packages as $pack)
                <div class="page-header">
                    <div class="page-header-img">
                        <img src="{{asset('assets/site/images/page-head-bg.jpg')}}">
                    </div><!-- End Page-Header-Img -->
                    <div class="container">
                        <h3 class="page-header-title">
                            @if (Config::get('app.locale') == 'en')
                                {{$pack->cat_name_en}}
                            @else
                                {{$pack->cat_name_ar}}
                            @endif
                        </h3>
                    </div><!-- End container -->
                </div><!-- End Page-Header -->
                <div class="page-content">
                    <section class="single-trip">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="widget trip-img">
                                        <div id="slider" class="flexslider">
                                            <ul class="slides">
                                                @foreach($images as $image)
                                                <li>
                                                    <img src="{{asset('storage/uploads/packages').'/'.$pack->image}}">
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div><!--End flexslider-->
                                        <div id="carousel" class="flexslider">
                                            <ul class="slides">
                                                @foreach($images as $image)
                                                <li>
                                                    <img src="{{asset('storage/uploads/packages').'/'.$pack->image}}">
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div><!--End flexslider-->
                                    </div><!--End Trip-Img -->
                                </div><!-- End col-lg-6 -->
                                <div class="col-lg-7">
                                    <div class="trip-detail">
                                        <div class="trip-detail-head">
                                            <h3 class="title">@if (Config::get('app.locale') == 'en')
                                                              {{$pack->pack_name_en}}
                                                          @else
                                                              {{$pack->pack_name_ar}}
                                                          @endif</h3>
                                            <div class="price">
                                                <span>${{$pack->price}}</span>
                                                <span>
                                                @if (Config::get('app.locale') == 'en')
                                                              /per person
                                                          @else
                                                              /للشخص الواحد
                                                          @endif</span>
                                            </div>
                                        </div><!-- End Trip-Detail-Head -->
                                        <div class="trip-detail-content">
                                            <p>
                                                @if (Config::get('app.locale') == 'en')
                                                            {{$pack->content_en}}
                                                          @else
                                                            {{$pack->content_ar}}
                                                          @endif
                                            </p>
                                        </div><!-- End Trip-Detail-Content -->
                                    </div>
                                </div><!-- End col -->
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </section><!-- End section -->
                    <section class="section-sm trip-cont-detail">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="trip-info">
                                        <div class="trip-desc">
                                            <h3 class="title has-before">
                                                @if (Config::get('app.locale') == 'en')
                                                            Discription
                                                          @else
                                                            الوصف
                                                          @endif
                                            </h3>
                                            <p>
                                                @if (Config::get('app.locale') == 'en')
                                                            {{$pack->desc_en}}
                                                          @else
                                                            {{$pack->desc_ar}}
                                                          @endif
                                            </p>
                                        </div><!-- End Trip-Desc -->
                                        <div class="trip-time">
                                            <h3  class="title has-before">
                                            @if (Config::get('app.locale') == 'en')
                                                            Appointments
                                                          @else
                                                            المواعيد
                                                          @endif
                                            </h3>
                                            <p>
                                                @if (Config::get('app.locale') == 'en')
                                                            {{$pack->appoint_en}}
                                                          @else
                                                            {{$pack->appoint_ar}}
                                                          @endif
                                            </p>
                                            <div class="trip-date">
                                                <p>
                                                    @if (Config::get('app.locale') == 'en')
                                                    <span>Start: </span>
                                                        {{$pack->start_en}}
                                                    @else
                                                    <span>البداية: </span>
                                                        {{$pack->start_ar}}
                                                    @endif
                                                </p>
                                                <p>
                                                    @if (Config::get('app.locale') == 'en')
                                                    <span>End: </span>
                                                    {{$pack->end_en}}
                                                    @else
                                                    <span>النهاية: </span>
                                                    {{$pack->end_ar}}
                                                    @endif
                                                </p>
                                            </div><!-- End-Times-->
                                        </div><!-- End Trip-Time -->
                                        <div class="trip-price">
                                            <h3  class="title has-before">
                                            @if (Config::get('app.locale') == 'en')
                                                              Prices
                                                          @else
                                                               الأسعار
                                                          @endif
                                            </h3>
                                            <div class="price-item">
                                                <div class="price-item-head">
                                                    <i class="fa fa-user"></i>
                                                    <i class="fa fa-user"></i>
                                                    <i class="fa fa-user"></i>
                                                </div><!-- End Price-Item-Head -->
                                                <div class="price-item-content">
                                                    <p>
                                                        ${{$pack->price}} @if (Config::get('app.locale') == 'en')
                                                              /per person
                                                          @else
                                                              /للشخص الواحد
                                                          @endif
                                                    </p>
                                                </div><!-- End Price-item-Contant -->
                                            </div><!-- End Price-Item -->
                                            <div class="price-item">
                                                <div class="price-item-head">
                                                    <i class="fa fa-user"></i>
                                                    <i class="fa fa-user"></i>
                                                </div><!-- End Price-Item-Head -->
                                                <div class="price-item-content">
                                                    <p>
                                                        ${{$pack->price + 100}} @if (Config::get('app.locale') == 'en')
                                                              /per person
                                                          @else
                                                              /للشخص الواحد
                                                          @endif
                                                    </p>
                                                </div><!-- End Price-item-Contant -->
                                            </div><!-- End Price-Item -->
                                            <div class="price-item">
                                                <div class="price-item-head">
                                                    <i class="fa fa-user"></i>
                                                </div><!-- End Price-Item-Head -->
                                                <div class="price-item-content">
                                                    <p>
                                                        ${{$pack->price + 200}} @if (Config::get('app.locale') == 'en')
                                                              /per person
                                                          @else
                                                              /للشخص الواحد
                                                          @endif
                                                    </p>
                                                </div><!-- End Price-item-Contant -->
                                            </div><!-- End Price-Item -->
                                        </div><!-- End Package-Price -->
                                        <div class="trip-program-wrap">
                                            <h3  class="title has-before">
                                                @if (Config::get('app.locale') == 'en')
                                                              Program
                                                          @else
                                                              برنامج
                                                          @endif
                                            </h3>
                                            <div class="trip-program">
                                                @foreach($programmes as $p)
                                                <p>
                                                    <span>@if (Config::get('app.locale') == 'en')
                                                            {{$p->name_en}}
                                                          @else
                                                            {{$p->name_ar}}
                                                          @endif:</span>
                                                    <span>
                                                        @if (Config::get('app.locale') == 'en')
                                                            {{$p->content_en}}
                                                          @else
                                                            {{$p->content_ar}}
                                                          @endif
                                                    </span>
                                                </p>
                                                @endforeach
                                            </div><!-- End-trip-program-->
                                        </div><!-- End Trip-Program -->
                                    </div><!-- End Trip-Info -->
                                </div><!-- End col -->
                                <div class="col-lg-4">
                                    <div class="widget book-now">
                                        <form enctype="multipart/form-data" method="post" onsubmit="return false;" action="{{route('site.reserve')}}">
                                        {{ csrf_field() }}
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="@if (Config::get('app.locale') == 'en') Name @else الاسم @endif" name="name">
                                            </div><!-- End Form-Group -->
                                            <div class="form-group">
                                                <input class="form-control" type="tel" placeholder=" @if (Config::get('app.locale') == 'en') Phone @else الهاتف 
                                                @endif" name="phone">
                                            </div><!-- End Form-Group -->
                                            <div class="form-group">
                                                <input class="form-control" type="email" placeholder=" @if (Config::get('app.locale') == 'en') Email Address @else البريد الالكترونى
                                                @endif" name="email">
                                            </div><!-- End Form-Group -->
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder=" @if (Config::get('app.locale') == 'en') Address @else العنوان 
                                                @endif" name="address">
                                            </div><!-- End Form-Group -->
                                            <div class="form-group">
                                                <select class="form-control" name="package">
                                                    <option> @if (Config::get('app.locale') == 'en') Package @else الباقة 
                                                @endif</option>
                                                    @foreach($packs as $pa)
                                                    <option value="{{$pa->pack_id}}"> 
                                                        @if (Config::get('app.locale') == 'en')
                                                            {{$pa->pack_name_en}}
                                                        @else
                                                            {{$pa->pack_name_ar}}
                                                        @endif
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div><!-- End Form-Group -->
                                            <div class="form-group">
                                                <button class="custom-btn colored-btn addBTN" type="submit">  @if (Config::get('app.locale') == 'en') Book Now @else احجز الآن 
                                                @endif</button>
                                            </div><!-- End Form-Group -->
                                        </form><!-- End Form -->
                                    </div><!-- End Book-Now -->
                                </div><!-- End col -->
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </section><!-- End Section -->
                </div><!--End page-content-->  
@endforeach
@endsection