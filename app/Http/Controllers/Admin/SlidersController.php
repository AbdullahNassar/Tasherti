<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Slider;
use DB;
use Alert;

class SlidersController extends Controller {

    public function getIndex() {
        $sliders = Slider::all();
        return view('admin.pages.slider.index', compact('sliders'));
    }

    public function getAdd() {
        return view('admin.pages.slider.add');
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'head1_en' => 'required',
            'head1_ar' => 'required',
            'active' => 'required',
            'head2_en' => 'required',
            'head2_ar' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'head1_en.required' => 'Please Enter Slider Header 1 in English',
            'head1_ar.required' => 'Please Enter Slider Header 1 in Arabic',
            'active.required' => 'Please Enter Activation Status',
            'head2_en.required' => 'Please Enter Slider Header 2 in English',
            'head2_ar.required' => 'Please Enter Slider Header 2 in Arabic',
            'content_en.required' => 'Please Enter Slider Content in English',
            'content_ar.required' => 'Please Enter Slider Content in Arabic',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $image = $request->input('image');
        $head1_en = $request->input('head1_en');
        $head1_ar = $request->input('head1_ar');
        $head2_en = $request->input('head2_en');
        $head2_ar = $request->input('head2_ar');
        $content_en = $request->input('content_en');
        $content_ar = $request->input('content_ar');
        $active = $request->input('active');
        $data = array('image' => $image,'head1_ar' => $head1_ar ,'head1_en' => $head1_en ,'head2_ar' => $head2_ar ,'head2_en' => $head2_en ,'content_ar' => $content_ar ,'content_en' => $content_en ,'active' => $active);
        $slider = Slider::create($data);

        if ($slider){
            return ['status' => 'succes' ,'data' => 'Data is inserted Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
        
    }

    public function getEdit($id) {
        if (isset($id)) {
            $sliders = DB::table('sliders')
                ->select('sliders.*')
                ->where('id','=', $id)
                ->get();
            return view('admin.pages.slider.edit', compact('sliders'));
        }        
    }

    public function postEdit(Request $request) {

        $id = $request->input('s_id');
        $image = $request->input('image');
        $head1_en = $request->input('head1_en');
        $head1_ar = $request->input('head1_ar');
        $head2_en = $request->input('head2_en');
        $head2_ar = $request->input('head2_ar');
        $content_en = $request->input('content_en');
        $content_ar = $request->input('content_ar');
        $active = $request->input('active');
        $data = array('image' => $image,'head1_ar' => $head1_ar ,'head1_en' => $head1_en ,'head2_ar' => $head2_ar ,'head2_en' => $head2_en ,'content_ar' => $content_ar ,'content_en' => $content_en ,'active' => $active);
        $slider = DB::table('sliders')->where('id','=', $id)->update($data);
        if ($slider){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function delete($id) {
        if (isset($id)) {
            DB::table('sliders')->where('id','=', $id)->delete();
            return back();
        }
    }

}
