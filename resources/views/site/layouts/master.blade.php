
<!DOCTYPE html>
<html>
    <head>
        <!-- Meta Tags
        ========================== -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <!-- Site Title
        ========================== -->
        <title>@if (Config::get('app.locale') == 'en') Tasherti @else تأشيرتى @endif</title>

        <!-- Fave Icons
        ================================-->
        <link rel="shortcut icon" href="{{asset('assets/site/images/fav.png')}}">
        
        <!-- Css Base And Vendor 
        ===================================-->
        <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/bootstrap/css/bootstrap.css')}}">

        <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/font-awesome/css/font-awesome.min.css')}}">
        
        <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/owl-carousel/css/owl.carousel.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/owl-carousel/css/owl.theme.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/rs-plugin/css/settings.css')}}">

        <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/swipper/css/swiper.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/prettyPhoto/css/prettyPhoto.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('assets/site/vendor/flex-slider2/flexslider.css')}}">


        <!-- Site Css
        ====================================-->
        <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">
        @if (Config::get('app.locale') == 'ar')
        
        
        <link rel="stylesheet" href="{{asset('assets/site/css/style-ar.css')}}">
        
        @endif

        <link href="{{asset('assets/admin/sweetalert.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/css/Basic/custom.css')}}" rel="stylesheet">
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
        <![endif]-->
    </head>
    <body>
        <div class="wrapper">
            @include('site.layouts.header')
            <div class="main">
                @yield('content')
                @include('site.layouts.footer')
            </div><!--End Page-content-->
        </div><!-- End Wrapper -->
        @yield('modals')
        @yield('templates')
        <!-- common edit modal with ajax for all project -->
                <div id="common-modal" class="modal fade" role="dialog">
                    <!-- modal -->
                </div>

                <!-- delete with ajax for all project -->
                <div id="delete-modal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                    </div>
                </div>
                <script id="template-modal" type="text/html" >
                    <div class = "modal-content" >
                        <input type = "hidden" name = "_token" value="{{ csrf_token() }}" >
                        <div class = "modal-header" >
                            <button type = "button" class = "close" data - dismiss = "modal" > &times; </button>
                            <h4 class = "modal-title bold" >Delete item?</h4>
                        </div>
                        <div class = "modal-body" >
                            <p >Are you sure?</p>
                        </div>
                        <div class = "modal-footer" >
                            <a
                                href = "{url}"
                                id = "delete" class = "btn btn-danger" >
                                <li class = "fa fa-trash" > </li> Delete
                            </a>

                            <button type = "button" class = "btn btn-warning" data-dismiss = "modal" >
                                <li class = "fa fa-times" > </li> Cancel</button >
                        </div>
                    </div>
                </script>
                
                @include('site.templates.alerts')
                @include('site.templates.delete-modal')

                <form action="#" id="csrf">{!! csrf_field() !!}</form>
        <!-- JS Base & Vendors
        ========================== -->
        <script src="{{asset('assets/site/vendor/jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/site/vendor/popper.js')}}"></script>
        <script src="{{asset('assets/site/vendor/nicescroll/jquery.nicescroll.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('assets/site/vendor/isotope/isotope.js')}}"></script>
        <script src="{{asset('assets/site/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
        <script src="{{asset('assets/site/vendor/swipper/js/swiper.js')}}"></script>
        <script src="{{asset('assets/site/vendor/prettyPhoto/js/jquery.prettyPhoto.js')}}"></script>
        <script src="{{asset('assets/site/vendor/flex-slider2/jquery.flexslider.js')}}"></script>

        <script src="{{asset('assets/site/js/main.js')}}"></script> 
        <script src="{{asset('assets/site/sweetalert.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/site/process.js')}}" type="text/javascript"></script>
    </body>
</html>