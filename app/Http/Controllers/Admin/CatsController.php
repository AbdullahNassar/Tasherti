<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cat;
use DB;

class CatsController extends Controller
{
    public function getIndex() {
    	$categories = Cat::all();
        return view('admin.pages.cat.index', compact('categories'));
    }

    public function getAdd() {
        return view('admin.pages.cat.add');
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'c_name_ar' => 'required',
            'c_name_en' => 'required',
            'active' => 'required',
        ] ,[
            'c_name_ar.required' => 'Please Enter Category Name in English',
            'c_name_en.required' => 'Please Enter Category Name in Arabic',
            'active.required' => 'Please Enter Category Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $c_name_ar = $request->input('c_name_ar');
        $c_name_en = $request->input('c_name_en');
    	$active = $request->input('active');
    	$data = array('c_name_ar' => $c_name_ar ,'c_name_en' => $c_name_en ,
            'active' => $active);
    	$category = Cat::create($data);

        if ($category){
            return ['status' => 'succes' ,'data' => 'Data is inserted Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function getEdit($id) {
    	if (isset($id)) {
	        $categories = DB::table('cats')->select('cats.*')->where('c_id','=', $id)->get();
	        return view('admin.pages.cat.edit', compact('categories'));
        }
    }

    public function postEdit(Request $request) {

    	$id = $request->input('s_id');
        $c_name_ar = $request->input('c_name_ar');
        $c_name_en = $request->input('c_name_en');
        $active = $request->input('active');
        $data = array('c_name_ar' => $c_name_ar ,'c_name_en' => $c_name_en ,
            'active' => $active);

    	$category = DB::table('cats')->where('c_id','=', $id)->update($data);
    	if ($category){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function delete($id) {
    	if (isset($id)) {
	    	DB::table('cats')->where('c_id','=', $id)->delete();
	    	return back();
	    }
    }

}
