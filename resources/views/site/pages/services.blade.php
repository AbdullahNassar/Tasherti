@extends('site.layouts.master')
@section('content')
                <div class="page-header">
                    <div class="page-header-img">
                        <img src="{{asset('assets/site/images/page-head-bg.jpg')}}">
                    </div><!-- End Page-Header-Img -->
                    <div class="container">
                        <h3 class="page-header-title">
                            Our Services
                        </h3>
                    </div><!-- End container -->
                </div><!-- End Page-Header -->
                <div class="page-content">
                    <section class="section-md categories style-2">
                        <div class="container">
                            <div class="section-head text-center">
                                <h3 class="section-title has-after">
                                    @if (Config::get('app.locale') == 'en')
                                                {{$data->get('services_en')}}
                                            @else
                                                {{$data->get('services_ar')}}
                                            @endif
                                </h3>
                                <p>
                                    @if (Config::get('app.locale') == 'en')
                                                {{$data->get('services_content_en')}}
                                            @else
                                                {{$data->get('services_content_ar')}}
                                            @endif
                                </p>
                            </div><!-- End Section-Head -->
                            <div class="section-content">
                                <div class="row">
                                    @if (Config::get('app.locale') == 'en')
                                    @foreach($services as $service)
                                    <div class="col-lg-6">
                                        <div class="box-item style-1">
                                            <div class="box-item-img">
                                                <img src="{{asset('storage/uploads/services').'/'.$service->image}}" alt="package image">
                                            </div>
                                            <div class="box-item-content">
                                                <div class="trip-head">
                                                    <div class="price">
                                                        <span>${{$service->price}} </span>
                                                        <span>/per person</span>
                                                    </div>
                                                    <h3 class="title title-lg">{{$service->name_en}}</h3>
                                                    <ul class="rating-list">
                                                        @for ($i = 1; $i <= $service->rate; $i++)
                                                              <li>
                                                                <i class="fa fa-star"></i>
                                                              </li>
                                                            @endfor
                                                    </ul><!-- End Rating-List -->
                                                </div><!-- End Trip-Head -->
                                                <div class="trip-body">
                                                    <p>
                                                        {{$service->content_en}}
                                                    </p>
                                                </div><!-- End Trip-Body -->
                                                <a href="{{ route('site.packs' , ['id' => $service->id]) }}" class="custom-btn">Read More</a>
                                            </div><!--End Box-item-content-->
                                        </div><!--End box-item-->
                                    </div><!-- End col -->
                                    @endforeach
                                    @else
                                    @foreach($services as $service)
                                    <div class="col-lg-6">
                                        <div class="box-item style-1">
                                            <div class="box-item-img">
                                                <img src="{{asset('storage/uploads/services').'/'.$service->image}}" alt="package image">
                                            </div>
                                            <div class="box-item-content">
                                                <div class="trip-head">
                                                    <div class="price">
                                                        <span>${{$service->price}} </span>
                                                        <span>/per person</span>
                                                    </div>
                                                    <h3 class="title title-lg">{{$service->name_ar}}</h3>
                                                    <ul class="rating-list">
                                                        @for ($i = 1; $i <= $service->rate; $i++)
                                                              <li>
                                                                <i class="fa fa-star"></i>
                                                              </li>
                                                            @endfor
                                                    </ul><!-- End Rating-List -->
                                                </div><!-- End Trip-Head -->
                                                <div class="trip-body">
                                                    <p>
                                                        {{$service->content_ar}}
                                                    </p>
                                                </div><!-- End Trip-Body -->
                                                <a href="{{ route('site.packs' , ['id' => $service->id]) }}" class="custom-btn">@if (Config::get('app.locale') == 'en')
                                                          Read More
                                                      @else
                                                          اقرأ المزيد
                                                      @endif</a>
                                            </div><!--End Box-item-content-->
                                        </div><!--End box-item-->
                                    </div><!-- End col -->
                                    @endforeach
                                    @endif
                                </div><!-- End row -->
                            </div><!-- End Section-content -->
                        </div><!-- End container -->
                    </section><!-- End Section -->
                    <section class="text-center call-to-action">
                        <div class="container">
                            <div class="row">
                                @foreach($packages as $pack)
                                @if($loop->index < 1)
                                <div class="col-lg-9 m-auto">
                                    <div class="section-head">
                                        <h3 class="section-title">
                                            @if (Config::get('app.locale') == 'en')
                                                {{$pack->pack_name_en}}
                                            @else
                                                {{$pack->pack_name_ar}}
                                            @endif
                                        </h3>
                                    </div><!-- End Section-Head -->
                                    <div class="section-content">
                                        <p>
                                            @if (Config::get('app.locale') == 'en')
                                            @php
                                            $brief = substr($pack->content_en, 0, 300);
                                            @endphp
                                            {{strip_tags($brief)}}...
                                            @else
                                            @php
                                            $brief = substr($pack->content_ar, 0, 300);
                                            @endphp
                                            {{strip_tags($brief)}}...
                                            @endif
                                        </p>
                                        <a href="{{ route('site.package' , ['id' => $pack->pack_id]) }}" class="custom-btn">@if (Config::get('app.locale') == 'en')
                                                          Read More
                                                      @else
                                                          اقرأ المزيد
                                                      @endif</a>
                                    </div><!-- End Section-Content -->
                                </div><!-- End col-->
                                @endif
                                @endforeach
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </section><!-- End Section -->
                </div><!--End page-content-->  
@endsection