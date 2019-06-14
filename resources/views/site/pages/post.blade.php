@extends('site.layouts.master')
@section('content')
@foreach($posts as $post)
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
                                    <div class="widget blog-item blog-post-item">
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
                                                    @if (Config::get('app.locale') == 'en')
                                                    {{$post->head_en}}
                                                    @else
                                                    {{$post->head_ar}}
                                                    @endif
                                                </h3>
                                            </div><!-- End Blog-Head -->
                                            <div class="blog-content">
                                                <p>
                                                    @if (Config::get('app.locale') == 'en')
                                                    {{$post->content_en}}
                                                    @else
                                                    {{$post->content_ar}}
                                                    @endif
                                                </p>
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
                                    <div class="widget blog-post-comments">
                                        <div class="blog-comments-title">
                                            <h3 class="title has-before">@if (Config::get('app.locale') == 'en') Comments @else تعليقات @endif</h3>
                                        </div><!-- End Blog-Comments-title -->
                                        @foreach($comments as $comment)
                                        <div class="comment">
                                            <div class="comment-item-img">
                                                <img src="{{asset('assets/site/images/user.jpg')}}">
                                            </div>
                                            <div class="comment-item-content">
                                                <h3 class="title title-sm">{{$comment->name}}</h3>
                                                <span class="blog-date">{{(new DateTime($comment->updated_at))->format('j M Y')}}</span>
                                                <p>
                                                    {{$comment->comment}} 
                                                </p>
<!--                                                <button class="custom-btn colored-btn">Reply</button>-->
                                                
                                                <button class="custom-btn colored-btn" data-toggle="collapse" data-target="#replay-box-1" aria-expanded="false" aria-controls="collapseExample">@if (Config::get('app.locale') == 'en') Reply @else رد @endif</button>
                                            </div>
                                            <div class="collapse" id="replay-box-1">
                                                <div class="comment reply-comment">
                                                    <div class="comment-item-img">
                                                        <img src="{{asset('assets/site/images/user.jpg')}}">
                                                    </div>
                                                    <div class="comment-item-content">
                                                        <form enctype="multipart/form-data" method="post" onsubmit="return false;" action="{{route('site.reply')}}" class="form">
                                                            {{ csrf_field() }}
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="s_id" value="{{ $post->id }}">
                                                                        <input type="hidden" name="c_id" value="{{ $comment->co_id }}">
                                                                        <input type="text" class="form-control" placeholder="@if (Config::get('app.locale') == 'en') Full Name @else الاسم بالكامل @endif" name="name">
                                                                    </div><!-- End Form-Group -->
                                                                </div><!-- End col -->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="email" class="form-control" placeholder=" @if (Config::get('app.locale') == 'en') Email Address @else البريد الالكترونى @endif" name="email">
                                                                    </div><!-- End Form-Group -->
                                                                </div><!-- End col -->
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <textarea class="form-control" placeholder=" @if (Config::get('app.locale') == 'en') Message @else الرسالة @endif" rows="6" name="message"></textarea>
                                                                    </div><!-- End Form-Group -->
                                                                </div><!-- End col -->
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <button type="submit" class="custom-btn addBTN">
                                                                        @if (Config::get('app.locale') == 'en') Reply @else رد @endif</button>
                                                                    </div><!-- End Form-Group -->
                                                                </div><!-- End col -->
                                                            </div><!-- End row -->
                                                        </form><!-- End form -->
                                                    </div>
                                                </div><!-- End Comments -->
                                            </div><!--End Replay-box-->
                                        </div><!-- End Comments -->
                                        @endforeach
                                    </div><!-- End Blog-Post-Comment -->
                                    <div class="widget write-comments">
                                        <div class="blog-comments-title">
                                            <h3 class="title has-before">@if (Config::get('app.locale') == 'en') Comment @else تعليق @endif</h3>
                                        </div><!-- End Blog-Comments-title -->
                                        <form enctype="multipart/form-data" method="post" onsubmit="return false;" action="{{route('site.comment')}}" class="form">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="hidden" name="s_id" value="{{ $post->id }}">
                                                        <input type="text" class="form-control" placeholder="@if (Config::get('app.locale') == 'en') Full Name @else الاسم بالكامل @endif" name="name">
                                                    </div><!-- End Form-Group -->
                                                </div><!-- End col -->
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <input type="email" class="form-control" placeholder=" @if (Config::get('app.locale') == 'en') Email Address @else البريد الالكترونى @endif" name="email">
                                                    </div><!-- End Form-Group -->
                                                </div><!-- End col -->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control" placeholder=" @if (Config::get('app.locale') == 'en') Message @else الرسالة @endif" rows="6" name="message"></textarea>
                                                    </div><!-- End Form-Group -->
                                                </div><!-- End col -->
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <button type="submit" class="custom-btn addBTN">
                                                                        @if (Config::get('app.locale') == 'en') Comment @else تعليق @endif</button>
                                                    </div><!-- End Form-Group -->
                                                </div><!-- End col -->
                                            </div><!-- End row -->
                                        </form><!-- End form -->
                                    </div>   
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
                                                            {{$post->head_en}}
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
                                                            {{$post->head_ar}}
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
@endforeach
@endsection