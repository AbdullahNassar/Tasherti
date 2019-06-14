<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service;
use App\Cat;
use DB;

class ServicesController extends Controller
{
    public function getIndex() {
    	$services = Service::all();
        return view('admin.pages.service.index', compact('services'));
    }

    public function getAdd() {
        return view('admin.pages.service.add');
    }

    public function postAdd(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'name_en' => 'required',
            'name_ar' => 'required',
            'price' => 'required',
            'rate' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'name_en.required' => 'Please Enter Service Name in English',
            'name_ar.required' => 'Please Enter Service Name in Arabic',
            'price.required' => 'Please Enter Service Price',
            'rate.required' => 'Please Enter Service Rate',
            'content_en.required' => 'Please Enter Service Content in English',
            'content_ar.required' => 'Please Enter Service Content in Arabic',
            'active.required' => 'Please Enter Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $name_en = $request->input('name_en');
        $name_ar = $request->input('name_ar');
        $price = $request->input('price');
        $rate = $request->input('rate');
        $content = $request->input('content');
        $content_ar = $request->input('content_ar');
        $image = $request->input('image');
        $active = $request->input('active');
        $category_id = $request->input('cat_id');
        $data = array('image' => $image ,'name' => $name ,'name_ar' => $name_ar,'content' => $content ,'content_ar' => $content_ar ,'price' => $price ,'rate' => $rate ,'active' => $active);
        $R = Service::create($data);
        if ($R){
            return ['status' => 'succes' ,'data' => 'Data is inserted Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
        
    }

    public function getEdit($id) {
        if (isset($id)) {
            $services = DB::table('services')
                ->select('services.*')
                ->where('id','=', $id)
                ->get();
            return view('admin.pages.service.edit', compact('services'));
        }        
    }

    public function postEdit(Request $request) {

        $id = $request->input('s_id');
        $name_en = $request->input('name_en');
        $name_ar = $request->input('name_ar');
        $price = $request->input('price');
        $rate = $request->input('rate');
        $content = $request->input('content');
        $content_ar = $request->input('content_ar');
        $image = $request->input('image');
        $active = $request->input('active');
        $category_id = $request->input('cat_id');
        $data = array('image' => $image ,'name' => $name ,'name_ar' => $name_ar,'content' => $content ,'content_ar' => $content_ar ,'price' => $price ,'rate' => $rate ,'active' => $active);
        $R = DB::table('services')->where('id','=', $id)->update($data);
        if ($R){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function delete($id) {
        if (isset($id)) {
            DB::table('services')->where('id','=', $id)->delete();
            return back();
        }
    }

}
