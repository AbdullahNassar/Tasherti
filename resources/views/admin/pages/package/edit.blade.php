@extends('admin.layouts.master')
@section('title')
Admin Panel
@endsection
@section('content')
@foreach($packages as $package)
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
                                <span>Packages</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Edit Package 
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                    </div><!--End tools-->
                                </div><!-- portlet-title-->
                                <form action="{{route('admin.package.addImages')}}" style="border: solid 1px; border-color:#000; width: 1050px; height: 300px; margin: 30px; " class="dropzone" id="my-dropzone" method="post">
                                    {{ csrf_field() }}
                                        <p style="text-align: center; font-size: large;">Add New Images</p>
                                        <input type="hidden" name="package_id" value="{{ $package->pack_id }}">
                                </form>
                                <div style=" width: 100%; margin-bottom: 100px; margin-top: 60px; margin-left: 30px;">
                                    <div class="col-md-12" style="border: solid 1px; border-color:#fff; width:1050px; height: 100%; padding-left: 35px;">
                                        <p style="margin-left: 420px; font-size: large; margin-bottom: 20px;">Package Images</p>
                                        @foreach($images as $image)
                                        <div class="col-md-2" style="border: solid 1px; border-color:#fff; margin-bottom: 70px; margin: 5px; padding: 5px; margin-bottom: 50px;  margin-left: 20px;">
                                            <ul style="margin-left: 25px; padding: 0;">
                                                <li style="list-style-type: none; list-style-position: inside;">
                                                    <img style="max-width: 120px; max-height: 70px; margin-bottom: 20px;" src="{{asset($image->pimage)}}"/>
                                                </li>
                                                <li style="list-style-type: none; list-style-position: inside;">
                                                    <a class="btn white btn-sm btn-outline sbold uppercase" href="{{ route('admin.package.deleteImg' , ['id' => $image->id]) }}">Delete Image</a>
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
                                    
                                    <form action="{{ route('admin.package.edit' , ['id' => $package->pack_id]) }}" class="form-horizontal" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                        <div class="form-body">
                                            {{ csrf_field() }}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="choose-img">
                                                        
                                                        <input type="hidden" value="{{route('admin.upload.post')}}" id="url" >
                                                        <input type="hidden" value="packages" id="storage" >
                                                        <input type="hidden" name="image" value="{{$package->image}}" id="img" >
                                                        <input type="file" name="image" id="image" required>
                                                        <img src="{{asset('storage/uploads/packages').'/'.$package->image}}"/>
                                                    </div><!-- End Choose-Img -->
                                                    <div class="upload-action">
                                                        <button class="btn blue btn-sm btn-outline sbold uppercase" type="button" id="upload-btn">
                                                            Upload Image
                                                        </button>
                                                        <div class="progress">
                                                            <div id="progressBar" value="0" max="100" class="progress-bar" role="progressbar" style="width: 0%;">0%
                                                            </div>
                                                        </div>
                                                        <h3 id="status"></h3>
                                                        <p id="loaded_n_total"></p><br>
                                                    </div><!--End upload-action-->
                                                </div><!-- End Form-Group -->
                                            </div><!-- End col -->
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Activation :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-gift"></i>
                                                        </span>
                                                        <select class="form-control" name="active" required>
                                                                <option selected value="{{ $package->active }}">@if($package->active == 1)
                                                                                Active
                                                                @elseif($package->active == 0)
                                                                                Not Active
                                                                @endif 
                                                                </option>
                                                                <option value="1">Active</option>
                                                                <option value="0">Not Active</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Show in Home Page :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-gift"></i>
                                                        </span>
                                                        <select class="form-control" name="h_show">
                                                                <option selected value="{{ $package->h_show }}">@if($package->h_show == 1)
                                                                                Yes
                                                                @elseif($package->h_show == 0)
                                                                                No
                                                                @endif 
                                                                </option>
                                                                <option value="1">Yes</option>
                                                                <option value="0">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Show in Services Page :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-gift"></i>
                                                        </span>
                                                        <select class="form-control" name="s_show">
                                                                <option selected value="{{ $package->s_show }}">@if($package->s_show == 1)
                                                                                Yes
                                                                @elseif($package->s_show == 0)
                                                                                No
                                                                @endif 
                                                                </option>
                                                                <option value="1">Yes</option>
                                                                <option value="0">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Package Rate :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-gift"></i>
                                                        </span>
                                                        <select class="form-control" name="rate">
                                                                <option value="{{$package->rate}}">{{$package->rate}}</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                        </select> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Package Name in English :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="hidden" name="s_id" value="{{ $package->pack_id }}">
                                                        <input type="text" name="pack_name_en" value="{{$package->pack_name_en}} " class="form-control " placeholder="Package Name in English ..." required> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Package Name in Arabic :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="text" name="pack_name_ar" value="{{$package->pack_name_ar}} " class="form-control " placeholder="Package Name in Arabic..." required> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Package Content in English :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea type="text" rows="5" name="content_en" class="form-control " placeholder="Package Content in English...">{{$package->content_en}}</textarea>
                                                    </div>
                                                </div>
                                            </div><div class="form-group">
                                                <label class="col-md-3 control-label">package Content in Arabic :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea type="text" rows="5" name="content_ar" class="form-control " placeholder="package Content in Arabic...">{{$package->content_ar}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Package Description in English :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" type="text" name="desc_en" class="form-control " placeholder="Package Description in English...">{{$package->desc_en}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Package Description in Arabic :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" type="text" name="desc_ar" class="form-control " placeholder="Package Description in Arabic...">{{$package->desc_ar}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Package Appointment in English :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" type="text" name="appoint_en" class="form-control " placeholder="Package Appointment in English...">{{$package->appoint_en}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Package Appointment in Arabic :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" type="text" name="appoint_ar" class="form-control " placeholder="Package Appointment in Arabic...">{{$package->appoint_ar}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Package Start in English :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" type="text" name="start_en" class="form-control " placeholder="Package Start in English...">{{$package->start_en}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Package Start in Arabic :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" type="text" name="start_ar" class="form-control " placeholder="Package Start in Arabic...">{{$package->start_ar}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Package End in English :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" type="text" name="end_en" class="form-control " placeholder="Package End in English...">{{$package->end_en}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Package End in Arabic :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea rows="5" type="text" name="end_ar" class="form-control " placeholder="Package End in Arabic...">{{$package->end_ar}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Package Price :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="number" name="price" class="form-control " placeholder="Package Price..." value="{{$package->price}}"> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Package Service :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-gift"></i>
                                                        </span>
                                                        <select class="form-control" name="service_id" required>
                                                                <option value="{{$package->service_id}}">{{$package->name_en}}</option>
                                                                @foreach($services as $service)
                                                                <option value="{{$service->id}}">{{$service->name_en}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Package Category :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-gift"></i>
                                                        </span>
                                                        <select class="form-control" name="category_id" required>
                                                                <option value="{{$package->category_id}}">{{$package->cat_name_en}}</option>
                                                                @foreach($categories as $category)
                                                                <option value="{{$category->cat_id}}">{{$category->cat_name_en}}</option>
                                                                @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green addBTN">Submit</button>
                                                    <a href="{{route('admin.packages')}}" type="button" class="btn  grey-salsa btn-outline">Cancel</a>
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