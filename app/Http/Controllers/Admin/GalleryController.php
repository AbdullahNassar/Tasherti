<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class GalleryController extends Controller
{
    public function getIndex() {
    	$gallery = DB::table('gallery')
                ->select('gallery.*')
                ->get();
        return view('admin.pages.gallery.index', compact('gallery'));
    }

    public function getAdd() {
        return view('admin.pages.gallery.add');
    }

    public function postAdd(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'name_ar' => 'required',
            'name_en' => 'required',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'name_ar.required' => 'Please Enter Gallery Name in Arabic',
            'name_en.required' => 'Please Enter Gallery Name in English',
            'active.required' => 'Please Enter Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $image = $request->input('image');
        $name_ar = $request->input('name_ar');
        $name_en = $request->input('name_en');
        $active = $request->input('active');
        $data = array('image' => $image ,'name_ar' => $name_ar ,'name_en' => $name_en ,'active' => $active);
        $gallery = Storie::create($data);
        if ($gallery){
            return ['status' => 'succes' ,'data' => 'Data is inserted Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
        
    }

    public function getEdit($id) {
        if (isset($id)) {
            $gallery = DB::table('gallery')
                ->select('gallery.*')
                ->where('id','=', $id)
                ->get();
            return view('admin.pages.gallery.edit', compact('gallery'));
        }        
    }

    public function postEdit(Request $request) {

        $id = $request->input('s_id');
        $image = $request->input('image');
        $name_ar = $request->input('name_ar');
        $name_en = $request->input('name_en');
        $active = $request->input('active');
        $data = array('image' => $image ,'name_ar' => $name_ar ,'name_en' => $name_en ,'active' => $active);

        $gallery = DB::table('gallery')->where('id','=', $id)->update($data);
        if ($gallery){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function delete($id) {
        if (isset($id)) {
            DB::table('gallery')->where('id','=', $id)->delete();
            return back();
        }
    }

}
