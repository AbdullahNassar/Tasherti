@extends('admin.layouts.master')
@section('title')
Admin Panel
@endsection
@section('content')
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
                                <span>Stories</span>
                            </li>
                        </ul>
                    </div>
                    <!-- END PAGE HEADER-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-gift"></i>Edit Story 
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse"> </a>
                                        <a href="#portlet-config" data-toggle="modal" class="config"> </a>
                                        <a href="javascript:;" class="reload"> </a>
                                    </div><!--End tools-->
                                </div><!-- portlet-title-->
                                <div class="portlet-body form">
                                    <!-- BEGIN FORM-->
                                    @foreach($stories as $story)
                                    <form action="{{ route('admin.story.edit' , ['id' => $story->id]) }}" class="form-horizontal" enctype="multipart/form-data" method="post" onsubmit="return false;">
                                        <div class="form-body">
                                            {{ csrf_field() }}
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="choose-img">
                                                        <input type="hidden" value="{{ $story->id }}" name="s_id" >
                                                        <input type="hidden" value="{{route('admin.upload.post')}}" id="url" >
                                                        <input type="hidden" value="stories" id="storage" >
                                                        <input type="hidden" name="image" value="{{$story->image}}" id="img" >
                                                        <input type="file" name="image" id="image" required>
                                                        <img src="{{asset('storage/uploads/stories').'/'.$story->image}}"/>
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
                                                                <option selected value="{{ $story->active }}">@if($story->active == 1)
                                                                                Active
                                                                @elseif($story->active == 0)
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
                                                <label class="col-md-3 control-label">Client Name in English :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="text" name="name_en" class="form-control " placeholder="Client Name in English ..." value="{{$story->name_en}}"> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Client Name in Arabic :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="text" name="name_ar" class="form-control " placeholder="Client Name in Arabic..." value="{{$story->name_ar}}"> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Client Story in English :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea type="text" rows="5" name="content_en" class="form-control " placeholder="Client Story in English...">{{$story->content_en}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Client Story in Arabic :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <textarea type="text" rows="5" name="content_ar" class="form-control " placeholder="Client Story in Arabic...">{{$story->content_ar}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Client Position in English :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="text" name="position_en" class="form-control " placeholder="Client Name in English ..." value="{{$story->position_en}}"> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label">Client Position in Arabic :</label>
                                                <div class="col-md-6">
                                                    <div class="input-group">
                                                        <span class="input-group-addon ">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                        <input type="text" name="position_ar" class="form-control " placeholder="Client Name in Arabic..." value="{{$story->position_ar}}"> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-9">
                                                    <button type="submit" class="btn green addBTN">Submit</button>
                                                    <a href="{{route('admin.stories')}}" type="button" class="btn  grey-salsa btn-outline">Cancel</a>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    @endforeach
                                    <!-- END FORM-->
                                </div><!--End portlet-body-->
                            </div><!--End portlet box green-->
                        </div><!--End Col-md-12-->
                    </div><!--End Row-->
                </div><!-- END CONTENT BODY -->
@endsection