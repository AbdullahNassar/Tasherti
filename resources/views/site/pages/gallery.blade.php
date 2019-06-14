@extends('site.layouts.master')
@section('content')
                <div class="page-header">
                    <div class="page-header-img">
                        <img src="{{asset('assets/site/images/page-head-bg.jpg')}}">
                    </div><!-- End Page-Header-Img -->
                    <div class="container">
                        <h3 class="page-header-title">
                            @if (Config::get('app.locale') == 'en')
                            Our Gallery
                            @else
                            معرض الصور
                            @endif
                        </h3>
                    </div><!-- End container -->
                </div><!-- End Page-Header -->
                <div class="page-content">
                    <section class="section-md gallery-page">
                        <div class="container">
                            <div class="row">
                                @foreach($gallery as $g)
                                <div class="col-lg-4">
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
                                </div><!-- End col -->
                                @endforeach
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </section><!-- End Section -->
                </div><!--End page-content-->  

@endsection