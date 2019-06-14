<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Programme;
use App\Package;
use DB;

class ProgrammesController extends Controller
{
    public function getIndex() {
    	$programmes = Programme::all();
        return view('admin.pages.program.index', compact('programmes'));
    }

    public function getAdd() {
        $packages = Package::all();
        return view('admin.pages.program.add', compact('packages'));
    }

    public function postAdd(Request $request) {
        $v = validator($request->all() ,[
            'name_en' => 'required',
            'name_ar' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
            'pack_id' => 'required',
            'active' => 'required',
        ] ,[
            'name_en.required' => 'Please Enter Program Name in English',
            'name_ar.required' => 'Please Enter Program Name in Arabic',
            'content_en.required' => 'Please Enter Program Content in English',
            'content_ar.required' => 'Please Enter Program Content in Arabic',
            'pack_id.required' => 'Please Select Package',
            'active.required' => 'Please Enter Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $name_en = $request->input('name_en');
        $name_ar = $request->input('name_ar');
        $content = $request->input('content');
        $content_ar = $request->input('content_ar');
        $active = $request->input('active');
        $pack_id = $request->input('pack_id');
        $data = array('name' => $name ,'name_ar' => $name_ar,'content' => $content ,'content_ar' => $content_ar 
            ,'packages_id' => $pack_id,'active' => $active);
        $R = Programme::create($data);
        if ($R){
            return ['status' => 'succes' ,'data' => 'Data is inserted Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
        
    }

    public function getEdit($id) {
        if (isset($id)) {
            $programmes = DB::table('programmes')
                ->join('packages','programmes.packages_id','=','packages.pack_id')
                ->select('programmes.*','packages.pack_name_en')
                ->where('programmes.packages_id','=', $id)
                ->get();
            $packages = Package::all();
            return view('admin.pages.program.edit', compact('programmes','packages'));
        }        
    }

    public function postEdit(Request $request) {

        $id = $request->input('s_id');
        $name_en = $request->input('name_en');
        $name_ar = $request->input('name_ar');
        $content = $request->input('content');
        $content_ar = $request->input('content_ar');
        $active = $request->input('active');
        $pack_id = $request->input('pack_id');
        $data = array('name' => $name ,'name_ar' => $name_ar,'content' => $content ,'content_ar' => $content_ar 
            ,'packages_id' => $pack_id,'active' => $active);
        $R = DB::table('programmes')->where('id','=', $id)->update($data);
        if ($R){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function delete($id) {
        if (isset($id)) {
            DB::table('programmes')->where('id','=', $id)->delete();
            return back();
        }
    }

}
