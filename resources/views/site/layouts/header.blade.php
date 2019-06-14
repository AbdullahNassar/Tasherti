<header class="header">
                <div class="top-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-7">
                                <div class="social-lang-head">
                                    <div class="dropdown lang">
                                        <button class="dropdown-toggle lang-btn" type="button" id="search-menu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            @if (Config::get('app.locale') == 'ar')
                                            <a href="{{route('site.lang','en')}}">
                                                En                        
                                            </a>
                                            @else
                                            <a href="{{route('site.lang','ar')}}">               
                                                AR 
                                            </a>
                                            @endif
                                            {{ csrf_field() }}
                                        </button>
                                    </div><!-- End Land -->
                                    <ul class="social-list">
                                        <li>
                                            <a href="{{$contact->get('facebook')}}">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{$contact->get('twitter')}}">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{$contact->get('google')}}">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{$contact->get('linkedin')}}">
                                                <i class="fa fa-whatsapp"></i>
                                            </a>
                                        </li>
                                    </ul><!-- End Social-List -->
                                </div><!-- End Social-Lang-Head -->
                            </div><!-- End col -->
                            <div class="col-md-6 col-sm-5">
                                <div class="contact-search-head">
                                    <ul class="contact-list">
                                        <li>
                                            <span>
                                            @if (Config::get('app.locale') == 'en')
                                                Call Us
                                            @else
                                                اتصل بنا
                                            @endif</span>
                                            <span>{{$contact->get('phone')}}</span>
                                        </li>
                                    </ul><!-- End Contact-List -->
                                    <div class="search-head">
                                        <form class="search-head-form" method="GET" action="{{route('blog.search')}}">
                                            <input type="text" class="form-control" placeholder="@if (Config::get('app.locale') == 'en') Search For... @else ابحث عن... @endif" name="search">
                                            <button class="btn-head" type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </form><!--End search-head-form-->
                                    </div>
                                </div><!-- End Contact-Search-Head -->
                            </div><!-- End col -->
                        </div><!-- End row -->
                    </div><!-- End container -->
                </div><!-- End Top-Header -->
                <div class="container">
                    <a href="{{URL::to('/')}}" class="logo">
                        <img src="{{asset('assets/site/images/logo.png')}}">
                    </a>
                    <button class="btn btn-responsive-nav" data-toggle="collapse" data-target="#nav-main">
                        <i class="fa fa-bars"></i>
                    </button>
                </div><!-- End container-->
                <nav class="navbar navbar-expand-lg">
                    <div class="container">
                        <div class="collapse navbar-collapse" id="nav-main">
                            <ul class="navbar-nav">
                                <li class="nav-item @if(Route::currentRouteName()=='site.home') active @endif"><a class="nav-link" href="{{URL::to('/')}}">{{trans('app.home')}}</a></li>
                                <li class="nav-item @if(Route::currentRouteName()=='site.about') active @endif"><a class="nav-link" href="{{URL::to('/about')}}">{{trans('app.about')}}</a></li>
                                <li class="nav-item @if(Route::currentRouteName()=='site.services') active @endif"><a class="nav-link" href="{{URL::to('/services')}}">{{trans('app.services')}}</a></li>
                                <li class="nav-item @if(Route::currentRouteName()=='site.gallery') active @endif"><a  class="nav-link"href="{{URL::to('/gallery')}}">{{trans('app.gallery')}}</a></li>
                                
                                <li class="nav-item @if(Route::currentRouteName()=='site.posts') active @endif"><a  class="nav-link"href="{{URL::to('/posts')}}">{{trans('app.blog')}}</a></li>
                                
                                <li class="nav-item @if(Route::currentRouteName()=='site.contact') active @endif"><a class="nav-link" href="{{URL::to('/contact')}}">{{trans('app.contact')}}</a></li>
                            </ul>
                        </div>
                    </div><!-- End container -->
                </nav>
            </header><!-- End Header -->
