@extends('site.layouts.master')
@section('content')
                <div class="page-header">
                    <div class="page-header-img">
                        <img src="{{asset('assets/site/images/page-head-bg.jpg')}}">
                    </div><!-- End Page-Header-Img -->
                    <div class="container">
                        <h3 class="page-header-title">
                            @if (Config::get('app.locale') == 'en')
                            Our Blog
                            @else
                            مدونتنا
                            @endif
                        </h3>
                    </div><!-- End container -->
                </div><!-- End Page-Header -->
                <div class="page-content">
                    <section class="section-md colored">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8">
                                    @if (Config::get('app.locale') == 'en')
                                    @foreach($posts as $post)
                                    <div class="widget blog-item">
                                        <div class="blog-item-img">
                                            <div class="blog-date">
                                                <span></span>
                                                <span>{{(new DateTime($post->updated_at))->format('j M Y')}}</span>
                                            </div><!-- End Blog-Date -->
                                            <img src="{{asset('storage/uploads/posts').'/'.$post->image}}" alt="...">
                                        </div><!-- End Blog-Item-Img -->
                                        <div class="blog-item-body">
                                            <div class="blog-head">
                                                <ul class="icon-list">
                                                    <li>
                                                        <i class="fa fa-folder-open"></i>
                                                        <span></span>
                                                        <span>Trips Tips</span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-comment"></i>
                                                        <span>22</span>
                                                        <span>Comments</span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-eye"></i>
                                                        <span>300</span>
                                                        <span></span>
                                                    </li>
                                                </ul><!-- End Blog-Icon -->
                                                <h3 class="title">
                                                    {{$post->english()->head}}
                                                </h3>
                                            </div><!-- End Blog-Head -->
                                            <div class="blog-content">
                                                <p>
                                                    @php
                                                    $brief = substr($post->english()->content, 0, 200);
                                                    @endphp
                                                    {{strip_tags($brief)}}...
                                                </p>
                                                <a href="{{ route('site.post' , ['id' => $post->id]) }}" class="custom-btn">Read more</a>
                                                <ul class="social-list a2a_kit a2a_kit_size_32 a2a_default_style">
                                                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                                                  <li>
                                                      <a class="a2a_button_facebook">
                                                          <i class="fa fa-facebook"></i>
                                                      </a>
                                                  </li>
                                                  <li>
                                                      <a class="a2a_button_twitter">
                                                          <i class="fa fa-twitter"></i>
                                                      </a>
                                                  </li>
                                                  <li>
                                                      <a class="a2a_button_google_plus">
                                                          <i class="fa fa-google-plus"></i>
                                                      </a>
                                                  </li>
                                                  <li>
                                                      <a class="a2a_dd" href="https://www.addtoany.com/share">
                                                          <i class="fa fa-plus-square"></i>
                                                      </a>
                                                  </li>
                                                </ul><!-- End Social-List -->
                                            </div><!-- End Blog-Content -->
                                        </div><!-- End Blog-Item-Body -->
                                    </div><!-- End Blog-Item -->
                                    @endforeach
                                    @else
                                    @foreach($posts as $post)
                                    <div class="widget blog-item">
                                        <div class="blog-item-img">
                                            <div class="blog-date">
                                                <span></span>
                                                <span>{{(new DateTime($post->updated_at))->format('j M Y')}}</span>
                                            </div><!-- End Blog-Date -->
                                            <img src="{{asset('storage/uploads/posts').'/'.$post->image}}" alt="...">
                                        </div><!-- End Blog-Item-Img -->
                                        <div class="blog-item-body">
                                            <div class="blog-head">
                                                <ul class="icon-list">
                                                    <li>
                                                        <i class="fa fa-folder-open"></i>
                                                        <span></span>
                                                        <span>Trips Tips</span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-comment"></i>
                                                        <span>22</span>
                                                        <span>Comments</span>
                                                    </li>
                                                    <li>
                                                        <i class="fa fa-eye"></i>
                                                        <span>300</span>
                                                        <span></span>
                                                    </li>
                                                </ul><!-- End Blog-Icon -->
                                                <h3 class="title">
                                                    {{$post->arabic()->head}}
                                                </h3>
                                            </div><!-- End Blog-Head -->
                                            <div class="blog-content">
                                                <p>
                                                    @php
                                                    $brief = substr($post->arabic()->content, 0, 200);
                                                    @endphp
                                                    {{strip_tags($brief)}}...
                                                </p>
                                                <a href="{{ route('site.post' , ['id' => $post->id]) }}" class="custom-btn">اقرأ المزيد</a>
                                                <ul class="social-list a2a_kit a2a_kit_size_32 a2a_default_style">
                                                    <script async src="https://static.addtoany.com/menu/page.js"></script>
                                                  <li>
                                                      <a class="a2a_button_facebook">
                                                          <i class="fa fa-facebook"></i>
                                                      </a>
                                                  </li>
                                                  <li>
                                                      <a class="a2a_button_twitter">
                                                          <i class="fa fa-twitter"></i>
                                                      </a>
                                                  </li>
                                                  <li>
                                                      <a class="a2a_button_google_plus">
                                                          <i class="fa fa-google-plus"></i>
                                                      </a>
                                                  </li>
                                                  <li>
                                                      <a class="a2a_dd" href="https://www.addtoany.com/share">
                                                          <i class="fa fa-plus-square"></i>
                                                      </a>
                                                  </li>
                                                </ul><!-- End Social-List -->
                                            </div><!-- End Blog-Content -->
                                        </div><!-- End Blog-Item-Body -->
                                    </div><!-- End Blog-Item -->
                                    @endforeach
                                    @endif
                                </div><!-- End col -->
                                <div class="col-lg-4">
                                    <div class="widget side-widget">
                                        <div class="side-widget-head">
                                            <h2 class="title has-before">
                                            @if (Config::get('app.locale') == 'en')
                                                    Search
                                                @else
                                                    ابحث
                                                @endif</h2>
                                        </div><!-- End Side-widget-Head -->
                                        <div class="side-widget-content">
                                            <div class="form-group">
                                                <form method="GET" action="{{route('blog.search')}}">
                                                    <input name="search" placeholder="@if (Config::get('app.locale') == 'en') Search For... @else ابحث عن... @endif" type="text" class="form-control">
                                                    <button type="submit" class="custom-btn colored-btn">@if (Config::get('app.locale') == 'en')
                                                        Search
                                                    @else
                                                        ابحث
                                                    @endif</button> 
                                                </form>
                                            </div><!-- End Form-group -->
                                        </div><!-- End Side-Widget-Content -->
                                    </div><!-- End Side-Widget -->
                                    
                                    <div class="widget side-widget">
                                        <div class="side-widget-head">
                                            <h2 class="title has-before">
                                                @if (Config::get('app.locale') == 'en')
                                                    Categories
                                                @else
                                                    الأقسام
                                                @endif
                                            </h2>
                                        </div><!--End Side-Widget-Head -->
                                        <div class="side-widget-content">
                                            <ul class="categories-list">
                                                @if (Config::get('app.locale') == 'en')
                                                @foreach($categories as $cat)
                                                <li><a href="{{ route('site.cposts' , ['id' => $cat->c_id]) }}">{{$cat->c_name_en}}</a></li>
                                                @endforeach
                                                @else
                                                @foreach($categories as $cat)
                                                <li><a href="{{ route('site.cposts' , ['id' => $cat->c_id]) }}">{{$cat->c_name_ar}}</a></li>
                                                @endforeach
                                                @endif
                                            </ul><!--End Categories-list-->
                                        </div><!--End Side-Widget-Content-->
                                    </div><!--End Side-widget-->
                                    <div class="widget side-widget">
                                        <div class="side-widget-head">
                                            <h2 class="title has-before">Latest News</h2>
                                        </div><!--End Side-Widget-Head -->
                                        <div class="side-widget-content">
                                            <ul class="recent-list">
                                                @if (Config::get('app.locale') == 'en')
                                                @foreach($posts as $post)
                                                <li>
                                                    <div class="recent-item-img">
                                                        <img src="{{asset('storage/uploads/posts').'/'.$post->image}}">
                                                    </div><!-- End Recent-Item -->
                                                    <div class="recent-item-content">
                                                        <a href="{{ route('site.post' , ['id' => $post->id]) }}">
                                                            {{$post->english()->head}}
                                                        </a>
                                                        <span class="blog-date">
                                                            {{(new DateTime($post->updated_at))->format('j M Y')}}
                                                        </span>
                                                    </div><!-- End Recent-Content -->
                                                </li>
                                                @endforeach
                                                @else
                                                @foreach($posts as $post)
                                                <li>
                                                    <div class="recent-item-img">
                                                        <img src="{{asset('storage/uploads/posts').'/'.$post->image}}">
                                                    </div><!-- End Recent-Item -->
                                                    <div class="recent-item-content">
                                                        <a href="{{ route('site.post' , ['id' => $post->id]) }}">
                                                            {{$post->arabic()->head}}
                                                        </a>
                                                        <span class="blog-date">
                                                            {{(new DateTime($post->updated_at))->format('j M Y')}}
                                                        </span>
                                                    </div><!-- End Recent-Content -->
                                                </li>
                                                @endforeach
                                                @endif
                                            </ul>
                                        </div><!-- Side-Widget-Content -->
                                    </div><!-- End Side-Widget -->
                                    <div class="widget side-widget">
                                        <div class="side-widget-head">
                                            <h2 class="title has-before">Tags</h2>
                                        </div><!--End Side-Widget-Head -->
                                        <div class="side-widget-content">
                                            <ul class="tags-list">
                                                @if (Config::get('app.locale') == 'en')
                                                @foreach($categories as $cat)
                                                <li><a href="{{ route('site.cposts' , ['id' => $cat->c_id]) }}">{{$cat->c_name_en}}</a></li>
                                                @endforeach
                                                @else
                                                @foreach($categories as $cat)
                                                <li><a href="{{ route('site.cposts' , ['id' => $cat->c_id]) }}">{{$cat->c_name_ar}}</a></li>
                                                @endforeach
                                                @endif
                                            </ul>
                                        </div><!--End Side-Widget-Content-->
                                    </div><!--End Side-Widget -->
                                </div><!-- End col -->
                            </div><!-- End row -->
                        </div><!-- End container -->
                    </section><!-- End Section -->
                </div><!--End page-content-->  
@endsection