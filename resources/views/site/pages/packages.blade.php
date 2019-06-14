@extends('site.layouts.master')
@section('content')
                <div class="page-header">
                    <div class="page-header-img">
                        <img src="{{asset('assets/site/images/page-head-bg.jpg')}}">
                    </div><!-- End Page-Header-Img -->
                    <div class="container">
                        <h3 class="page-header-title">
                            Packages
                        </h3>
                    </div><!-- End container -->
                </div><!-- End Page-Header -->
                <div class="page-content">
                    <section class="section-md single-package">
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
                                    @foreach($packages as $pack)
                                    <div class="col-lg-6">
                                        <div class="box-item list-item style-2">
                                            <div class="box-item-img">
                                                <img src="{{asset('storage/uploads/packages').'/'.$pack->image}}" alt="package image">
                                            </div>
                                            <div class="box-item-content">
                                                <div class="trip-head">
                                                    <div class="price">
                                                        <span>${{$pack->price}} </span>
                                                        <span>/per person</span>
                                                    </div>
                                                    <h3 class="title title-lg">@if (Config::get('app.locale') == 'en')
                                                              {{$pack->pack_name_en}}
                                                          @else
                                                              {{$pack->pack_name_ar}}
                                                          @endif</h3>
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
                                                <a href="{{ route('site.package' , ['id' => $pack->pack_id]) }}" class="custom-btn">@if (Config::get('app.locale') == 'en')
                                                          Read More
                                                      @else
                                                          اقرأ المزيد
                                                      @endif</a>
                                            </div><!--End Box-item-content-->
                                        </div><!--End box-item-->
                                    </div><!-- End col -->
                                    @endforeach
                                </div><!-- End row -->
                            </div><!-- End Section-content -->
                        </div><!-- End container -->
                    </section><!-- End Section -->
                </div><!--End page-content-->  
@endsection