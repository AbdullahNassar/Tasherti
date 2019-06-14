@extends('admin.layouts.master')
@section('title')
Admin Panel
@endsection
@section('content')
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="{{route('admin.home')}}">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                        </ul>
                    </div><!--End page-bar-->
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-3">
                            {!! $percentage_chart1->html() !!}
                        </div><!--End Col-md-6-->
                        <div class="col-md-3">
                            {!! $percentage_chart2->html() !!}
                        </div><!--End Col-md-6-->
                        <div class="col-md-3">
                            {!! $percentage_chart3->html() !!}
                        </div><!--End Col-md-6-->
                        <div class="col-md-3">
                            {!! $percentage_chart4->html() !!}
                        </div><!--End Col-md-6-->
                    </div><!--End Row-->
                    <br><br>
                    <div class="row">
                        <div class="col-md-6">
                            {!! $donut_chart->html() !!}
                        </div><!--End Col-md-6-->
                        <div class="col-md-6">
                            {!! $pie_chart2->html() !!}
                        </div><!--End Col-md-6-->
                        
                    </div><br><br>
                    <div class="row">
                        <div class="col-md-6">
                            {!! $line_chart->html() !!}
                        </div><!--End Col-md-6-->
                        <div class="col-md-6">
                            {!! $pie_chart->html() !!}
                        </div><!--End Col-md-6-->
                    </div><br><br>
                    
                </div><!-- END CONTENT BODY -->
                {!! Charts::scripts() !!}
                {!! $chart->script() !!}
                {!! $pie_chart->script() !!}
                {!! $line_chart->script() !!}
                {!! $areaspline_chart->script() !!}
                {!! $percentage_chart1->script() !!}
                {!! $percentage_chart2->script() !!}
                {!! $percentage_chart3->script() !!}
                {!! $percentage_chart4->script() !!}
                {!! $pie_chart2->script() !!}
                {!! $area_chart->script() !!}
                {!! $donut_chart->script() !!}
@endsection