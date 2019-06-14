<footer class="footer">
                    <div class="container">
                        <div class="footer-head text-center">
                           <a href="{{URL::to('/')}}" class="logo">
                                <img src="{{asset('assets/site/images/footer-logo.png')}}">
                            </a>
                            <p>
                                @if (Config::get('app.locale') == 'en')
                                    {{$data->get('footer_en')}}
                                @else
                                    {{$data->get('footer_ar')}}
                                @endif
                            </p>
                        </div><!-- End Section-Head -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="footer-widget">
                                    <div class="footer-widget-head">
                                        <h3 class="title">
                                            @if (Config::get('app.locale') == 'en')
                                                Our Services.
                                            @else
                                                لماذا تأشيرتى
                                            @endif
                                        </h3>
                                    </div><!-- End Footer-Widget-Head -->
                                    <div class="footer-widget-content">
                                        <p>
                                            @if (Config::get('app.locale') == 'en')
                                                {{$data->get('services_content_en')}}
                                            @else
                                                {{$data->get('services_content_ar')}}
                                            @endif
                                        </p>    
                                    </div><!-- End Footer-Widget-Content -->
                                </div><!-- End Footer-Widget -->
                            </div><!-- End col -->
                            <div class="col-lg-3">
                                <div class="footer-widget">
                                    <div class="footer-widget-head">
                                        @if (Config::get('app.locale') == 'en')
                                                <h3 class="title">our services</h3>
                                            @else
                                                <h3 class="title">خدماتنا</h3>
                                            @endif
                                            
                                    </div><!-- End Footer-Widget-Head -->
                                    <div class="footer-widget-content">
                                        <ul class="important-links">
                                            @foreach($services as $service)
                                            @if($loop->index < 3)
                                            <li><a href="{{ route('site.packs' , ['id' => $service->id]) }}"> 
                                                @if (Config::get('app.locale') == 'en')
                                                    {{$service->name_en}}
                                                @else
                                                    {{$service->name_ar}}
                                                @endif
                                            </a></li>
                                            @endif
                                            @endforeach
                                        </ul><!-- End Important-Lonks -->
                                    </div><!-- End Footer-Widget-Content -->
                                </div><!-- End Footer-Widget -->
                            </div><!-- End col -->
                            <div class="col-lg-3">
                                <div class="footer-widget">
                                    <div class="footer-widget-head">
                                        
                                        @if (Config::get('app.locale') == 'en')
                                                <h3 class="title">contact us</h3>
                                            @else
                                                <h3 class="title">معلومات التواصل</h3>
                                            @endif
                                            
                                    </div><!-- End Footer-Widget-Head -->
                                    <div class="footer-widget-content">
                                        <ul class="footer-contact"> 
                                            <li>
                                                @if (Config::get('app.locale') == 'en')
                                                <span>Email :</span>
                                                @else
                                                <span>البريد الالكتروني :</span>
                                                @endif
                                                {{$contact->get('email')}}
                                            </li>
                                            <li>
                                                @if (Config::get('app.locale') == 'en')
                                                <span>Address :</span>
                                                @else
                                                <span>العنوان :</span>
                                                @endif
                                                @if (Config::get('app.locale') == 'en')
                                                    {{$contact->get('address_en')}}
                                                @else
                                                    {{$contact->get('address_ar')}}
                                                @endif
                                            </li>
                                            <li>
                                                @if (Config::get('app.locale') == 'en')
                                                <span>Tel :</span>
                                                @else
                                                <span>التليفون :</span>
                                                @endif
                                                {{$contact->get('phone')}}
                                            </li>
                                        </ul>
                                    </div><!-- End Footer-Widget-Content -->
                                </div><!-- End Footer-Widget -->
                            </div><!-- End col -->
                        </div><!-- End row -->
                        <div class="row justify-content-md-center subscribe">
                            <div class="col-lg-5">
                                <form class="subscribe-form" enctype="multipart/form-data" method="post" onsubmit="return false;" action="{{route('site.subscribe')}}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="@if (Config::get('app.locale') == 'en') Enter E-mail Address @else ادخل البريد الالكتروني @endif" name="subscribe">
                                        <button class="custom-btn subscribe-btn addBTN" type="submit">@if (Config::get('app.locale') == 'en') Subscribe @else اشترك @endif</button>
                                    </div><!--End Form-group-->
                                </form>
                            </div><!-- End col -->
                            <div class="col-lg-4">
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
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{$contact->get('linkedin')}}">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                </ul><!-- End Social-List -->
                            </div><!-- End col -->
                        </div><!-- End subscribe -->
                    </div><!-- End container -->
                </footer><!-- End Footer -->
                <div class="copy-right">
                    <div class="container">
                        <div class="float-left">
                            
                            
                            @if (Config::get('app.locale') == 'en')
                                                © All Rights Reserved <a href="{{URL::to('/')}}">tasherti</a>
                                            @else
                                                © جميع الحقوق محفوظة <a href="{{URL::to('/')}}">تاشيرتى</a>
                                            @endif
                                            
                        </div>
                        <div class="float-right">
                            @if (Config::get('app.locale') == 'en')
                                                Designed &amp; Developed By <a href="http://upureka.com">Upureka</a>
                            
                                            @else
                                                تصميم وتطوير <a href="http://upureka.com">upureka</a>
                                            @endif
                                            
                        </div>
                    </div><!-- End container -->
                </div><!--End Copy-Right -->
