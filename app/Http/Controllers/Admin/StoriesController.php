<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Storie;
use DB;

class StoriesController extends Controller
{
    public function getIndex() {
    	$stories = Storie::all();
        return view('admin.pages.story.index', compact('stories'));
    }

    public function getAdd() {
        return view('admin.pages.story.add');
    }

    public function postAdd(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'name_ar' => 'required',
            'name_en' => 'required',
            'content_ar' => 'required',
            'content_en' => 'required',
            'position_ar' => 'required',
            'position_en' => 'required',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'name_ar.required' => 'Please Enter Client Name in Arabic',
            'name_en.required' => 'Please Enter Client Name in English',
            'content_ar.required' => 'Please Enter Client Story in Arabic',
            'content_en.required' => 'Please Enter Client Story in English',
            'position_ar.required' => 'Please Enter Client Position in Arabic',
            'position_en.required' => 'Please Enter Client Position in English',
            'active.required' => 'Please Enter Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $image = $request->input('image');
        $name_ar = $request->input('name_ar');
        $name_en = $request->input('name_en');
        $content_ar = $request->input('content_ar');
        $content_en = $request->input('content_en');
        $position_ar = $request->input('position_ar');
        $position_en = $request->input('position_en');
        $active = $request->input('active');
        $data = array('image' => $image ,'name_ar' => $name_ar ,'name_en' => $name_en ,'content_ar' => $content_ar ,'content_en' => $content_en ,'position_ar' => $position_ar ,'position_en' => $position_en ,'active' => $active);
        $story = Storie::create($data);
        if ($story){
            return ['status' => 'succes' ,'data' => 'Data is inserted Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
        
    }

    public function getEdit($id) {
        if (isset($id)) {
            $stories = DB::table('stories')
                ->select('stories.*')
                ->where('id','=', $id)
                ->get();
            return view('admin.pages.story.edit', compact('stories'));
        }        
    }

    public function postEdit(Request $request) {

        $id = $request->input('s_id');
        $image = $request->input('image');
        $name_ar = $request->input('name_ar');
        $name_en = $request->input('name_en');
        $content_ar = $request->input('content_ar');
        $content_en = $request->input('content_en');
        $position_ar = $request->input('position_ar');
        $position_en = $request->input('position_en');
        $active = $request->input('active');
        $data = array('image' => $image ,'name_ar' => $name_ar ,'name_en' => $name_en ,'content_ar' => $content_ar ,'content_en' => $content_en ,'position_ar' => $position_ar ,'position_en' => $position_en ,'active' => $active);

        $story = DB::table('stories')->where('id','=', $id)->update($data);
        if ($story){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function delete($id) {
        if (isset($id)) {
            DB::table('stories')->where('id','=', $id)->delete();
            return back();
        }
    }

}
