<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Package;
use App\Service;
use App\Categorie;
use DB;

class PackagesController extends Controller
{
    public function getIndex() {
    	$packages = Package::all();
        return view('admin.pages.package.index', compact('packages'));
    }

    public function getAdd() {
        $categories = Categorie::all();
        $services = Service::all();
        return view('admin.pages.package.add', compact('categories','services'));
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'pack_name_en' => 'required',
            'pack_name_ar' => 'required',
            'content_en' => 'required',
            'content_ar' => 'required',
            'desc_ar' => 'required',
            'desc_en' => 'required',
            'appoint_ar' => 'required',
            'appoint_en' => 'required',
            'start_ar' => 'required',
            'start_en' => 'required',
            'end_ar' => 'required',
            'end_en' => 'required',
            'price' => 'required',
            'h_show' => 'required',
            's_show' => 'required',
            'service_id' => 'required',
            'service_id' => 'required',
            'active' => 'required',
            'rate' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'pack_name_en.required' => 'Please Enter Package Name in English',
            'pack_name_ar.required' => 'Please Enter Package Name in Arabic',
            'content_en.required' => 'Please Enter Package Content in English',
            'content_ar.required' => 'Please Enter Package Content in Arabic',
            'desc_ar.required' => 'Please Enter Package Description in Arabic',
            'desc_en.required' => 'Please Enter Package Description in English',
            'appoint_ar.required' => 'Please Enter Package Appointment in Arabic',
            'appoint_en.required' => 'Please Enter Package Appointment in English',
            'start_ar.required' => 'Please Enter Package Start Time in Arabic',
            'start_en.required' => 'Please Enter Package Start Time in English',
            'end_ar.required' => 'Please Enter Package End Time in Arabic',
            'end_en.required' => 'Please Enter Package End Time in English',
            'price.required' => 'Please Enter Package Price',
            'h_show.required' => 'Please Select Home Page Show Status',
            's_show.required' => 'Please Select Services Page Show Status',
            'service_id.required' => 'Please Select Service',
            'category_id.required' => 'Please Select Category',
            'active.required' => 'Please Enter Activation Status',
            'rate.required' => 'Please Enter Package Rate',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

    	$pack_name_en = $request->input('pack_name_en');
        $pack_name_ar = $request->input('pack_name_ar');
        $content_en = $request->input('content_en');
        $content_ar = $request->input('content_ar');
        $desc_ar = $request->input('desc_ar');
        $desc_en = $request->input('desc_en');
        $appoint_ar = $request->input('appoint_ar');
        $appoint_en = $request->input('appoint_en');
        $start_ar = $request->input('start_ar');
        $start_en = $request->input('start_en');
        $end_ar = $request->input('end_ar');
        $end_en = $request->input('end_en');
        $price = $request->input('price');
        $h_show = $request->input('h_show');
        $s_show = $request->input('s_show');
        $service_id = $request->input('service_id');
        $category_id = $request->input('category_id');
    	$image = $request->input('image');
        $active = $request->input('active');
        $rate = $request->input('rate');
    	$data = array('image' => $image 
            ,'pack_name_ar' => $pack_name_ar ,'pack_name_en' => $pack_name_en
            ,'content_ar' => $content_ar ,'content_en' => $content_en 
            ,'desc_ar' => $desc_ar ,'desc_en' => $desc_en 
            ,'appoint_ar' => $appoint_ar ,'appoint_en' => $appoint_en 
            ,'start_ar' => $start_ar ,'start_en' => $start_en 
            ,'end_ar' => $end_ar ,'end_en' => $end_en 
            ,'price' => $price,'active' => $active ,'h_show' => $h_show 
            ,'s_show' => $s_show ,'service_id' => $service_id 
            ,'category_id' => $category_id ,'rate' => $rate 
            );
    	$d = Package::create($data);
        if ($d){
            return ['status' => 'succes' ,'data' => 'Data is inserted Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    	
    }

    public function getEdit($id) {
    	if (isset($id)) {
            $packages = DB::table('packages')
                ->join('categories','packages.category_id','=','categories.cat_id')
                ->join('services','packages.service_id','=','services.id')
                ->select('packages.*','categories.cat_name_en','services.name_en')
                ->where('packages.pack_id','=', $id)
                ->get();
            $images = DB::table('pimages')
                ->select('pimages.*')
                ->where('package_id','=', $id)
                ->get();
            $categories = Categorie::all();
            $services = Service::all();
	        return view('admin.pages.package.edit', compact('packages','images','categories','services'));
        }        
    }

    public function postEdit(Request $request) {
    	
        $id = $request->input('s_id');
        $pack_name_en = $request->input('pack_name_en');
        $pack_name_ar = $request->input('pack_name_ar');
        $content_en = $request->input('content_en');
        $content_ar = $request->input('content_ar');
        $desc_ar = $request->input('desc_ar');
        $desc_en = $request->input('desc_en');
        $appoint_ar = $request->input('appoint_ar');
        $appoint_en = $request->input('appoint_en');
        $start_ar = $request->input('start_ar');
        $start_en = $request->input('start_en');
        $end_ar = $request->input('end_ar');
        $end_en = $request->input('end_en');
        $price = $request->input('price');
        $h_show = $request->input('h_show');
        $s_show = $request->input('s_show');
        $service_id = $request->input('service_id');
        $category_id = $request->input('category_id');
        $image = $request->input('image');
        $active = $request->input('active');
        $rate = $request->input('rate');
        $data = array('image' => $image 
            ,'pack_name_ar' => $pack_name_ar ,'pack_name_en' => $pack_name_en
            ,'content_ar' => $content_ar ,'content_en' => $content_en 
            ,'desc_ar' => $desc_ar ,'desc_en' => $desc_en 
            ,'appoint_ar' => $appoint_ar ,'appoint_en' => $appoint_en 
            ,'start_ar' => $start_ar ,'start_en' => $start_en 
            ,'end_ar' => $end_ar ,'end_en' => $end_en 
            ,'price' => $price,'active' => $active ,'h_show' => $h_show 
            ,'s_show' => $s_show ,'service_id' => $service_id 
            ,'category_id' => $category_id ,'rate' => $rate 
            );
    	$d = DB::table('packages')->where('pack_id','=', $id)->update($data);
    	if ($d){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function delete($id) {
    	if (isset($id)) {
	    	$d = DB::table('packages')->where('pack_id','=', $id)->delete();
	    	return back();
	    }
    }

    public function getPostImages(Request $request) {
        $id = $request->input('package');
        $image = $request->file('file');
        if ($image) {
            $destination = storage_path('uploads/packages/');
            if (is_file($destination . "/{$image}")) {
                @unlink($destination . "/{$image}");
            }
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $image_path = "storage/uploads/packages".'/'.$imageName;
            $data = array('pimage'=>$image_path,'package_id'=>$id);
            DB::table('pimages')->insert($data);
        }
    }

    public function addImages(Request $request) {
        $id = $request->input('package_id');
        $image = $request->file('file');
        if ($image) {
            $destination = storage_path('uploads/packages/');
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $image_path = "storage/uploads/packages".'/'.$imageName;
            $data = array('pimage'=>$image_path,'package_id'=>$id);
            DB::table('pimages')->insert($data);
        }
    }

    public function deleteImage(Request $request,$id)
    {
        $image = DB::table('pimages')
                ->select('pimages.pimage')
                ->where('id','=', $id)
                ->get();
        $p_id = $request->input('package_id');
        if (isset($id)) {
            $destination = storage_path('uploads/package'.$p_id.'/');
            if (is_file($destination . "/{$image}")) {
                @unlink($destination . "/{$image}");
            }
            DB::table('pimages')->where('id','=', $id)->delete();
            return back();
        }
    }

    public function getGallery() {
        $packages = package::all();
        return view('admin.pages.package.gallery', compact('packages'));
    }

}
