@extends('admin.layouts.master')
@section('title')
Admin Panel
@endsection
@section('content')
@foreach($about as $ab)
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">

                    <div class="page-bar">
                        <ul class="page-breadcrumb">
                            <li>
                                <i class="icon-home"></i>
                                <a href="{{route('admin.home')}}">Home</a>
                                <i class="fa fa-angle-right"></i>
                            </li>
                            <li>
                                <span>About Us</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Edit About Us 
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                    </div><!--End tools-->
                                </div><!-- portlet-title-->
                                <form action="{{route('admin.about.addImages')}}" style="border: solid 1px; border-color:#000; width: 1050px; height: 300px; margin: 30px; " class="dropzone" id="my-dropzone" method="post">
                                    {{ csrf_field() }}
                                        <p style="text-align: center; font-size: large;">Add New Images</p>
                                </form>
                                <div style=" width: 100%; margin-bottom: 100px; margin-top: 60px; margin-left: 30px;">
                                    <div class="col-md-12" style="border: solid 1px; border-color:#fff; width:1050px; height: 100%; padding-left: 35px;">
                                        <p style="margin-left: 420px; font-size: large; margin-bottom: 20px;">About Us Images</p>
                                        @foreach($images as $image)
                                        <div class="col-md-2" style="border: solid 1px; border-color:#fff; margin-bottom: 70px; margin: 5px; padding: 5px; margin-bottom: 50px;  margin-left: 20px;">
                                            <ul style="margin-left: 25px; padding: 0;">
                                                <li style="list-style-type: none; list-style-position: inside;">
                                                    <img style="max-width: 120px; max-height: 70px; margin-bottom: 20px;" src="{{asset($image->image)}}"/>
                                                </li>
                                                <li style="list-style-type: none; list-style-position: inside;">
                                                    <a class="btn white btn-sm btn-outline sbold uppercase" href="{{ route('admin.about.deleteImg' , ['id' => $image->id]) }}">Delete Image</a>
                                                </li>
                                            </ul>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-12" style="width: 100%; margin-bottom: 20px; margin-top: 20px;">
                                    </div>
                                </div>
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    
                                    <form action="{{ route('admin.about.post') }}" class="form-horizontal" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                        <div class="form-body">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">About Head in English :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="text" name="head_en" value="{{$ab->head_en}} " class="form-control " placeholder="About Head in English ..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">About Head in Arabic :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="text" name="head_ar" value="{{$ab->head_ar}} " class="form-control " placeholder="About Head in Arabic..."> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">About Content in English :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea type="text" rows="5" name="content_en" class="form-control " placeholder="About Content in English...">{{$ab->content_en}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">About Content in Arabic :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea type="text" rows="5" name="content_ar" class="form-control " placeholder="About Content in Arabic...">{{$ab->content_ar}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green addBTN">Submit</button>
                                                    <a href="{{route('admin.home')}}" type="button" class="btn  grey-salsa btn-outline">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    
                                    <!-- END FORM-->
                                </div><!--End portlet-body-->
                            </div><!--End portlet box green-->
                        </div><!--End Col-md-12-->
                    </div><!--End Row-->
                </div><!-- END CONTENT BODY -->
@endforeach
@endsection