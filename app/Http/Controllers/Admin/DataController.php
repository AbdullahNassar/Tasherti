<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Data;
use DB;
use Alert;

class DataController extends Controller {

	public function getData()
    {
        $statics = DB::table('statics')
            ->select('statics.*')
            ->where('id','=', 1)
            ->get();
        return view('admin.pages.data', compact('statics'));
    }


    public function updateData(Request $request)
    {

        $image = $request->input('image');
        $image2 = $request->input('image2');
        $image3 = $request->input('image3');
        $about_content_ar = $request->input('about_content_ar');
        $about_content_en = $request->input('about_content_en');
        $why_ar = $request->input('why_ar');
        $why_en = $request->input('why_en');
        $block1_ar = $request->input('block1_ar');
        $block1_en = $request->input('block1_en');
        $b1_content_ar = $request->input('b1_content_ar');
        $b1_content_en = $request->input('b1_content__en');
        $services_ar = $request->input('services_ar');
        $services_en = $request->input('services_en');
        $services_content_ar = $request->input('services_content_ar');
        $services_content_en = $request->input('services_content_en');
        $contact_ar = $request->input('contact_ar');
        $contact_en = $request->input('contact_en');
        $footer_ar = $request->input('footer_ar');
        $footer_en = $request->input('footer_en');
        $footer_content_ar = $request->input('footer_content_ar');
        $footer_content_en = $request->input('footer_content_en');
        $button_ar = $request->input('button_ar');
        $button_en = $request->input('button_en');

        $data = array( 'about_image1' => $image ,
                       'about_image2' => $image2 ,
                       'why_image' => $image3 ,
                       'about_content_ar' => $about_content_ar,
                       'about_content_en' => $about_content_en,
                       'why_ar' => $why_ar,
                       'why_en' => $why_en,
                       'block1_ar' => $block1_ar,
                       'block1_en' => $block1_en,
                       'b1_content_ar' => $b1_content_ar,
                       'b1_content_en' => $b1_content_en,
                       'services_ar' => $services_ar,
                       'services_en' => $services_en,
                       'services_content_ar' => $services_content_ar,
                       'services_content_en' => $services_content_en,
                       'contact_ar' => $contact_ar,
                       'contact_en' => $contact_en,
                       'footer_ar' => $footer_ar,
                       'footer_en' => $footer_en,
                       'footer_content_ar' => $footer_content_ar,
                       'footer_content_en' => $footer_content_en,
                       'button_ar' => $button_ar,
                       'button_en' => $button_en,
                       );
        
        $c = DB::table('statics')->where('id', 1)->update($data);

        if ($c){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }
    
    public function updateAbout(Request $request)
    {
        $content_ar = $request->input('content_ar');
        $content_en = $request->input('content_en');
        $head_ar = $request->input('head_ar');
        $head_en = $request->input('head_en');

        $data = array( 
                       'head_ar' => $head_ar ,
                       'head_en' => $head_en ,
                       'content_ar' => $content_ar,
                       'content_en' => $content_en,
                       );
        
        $a = DB::table('about')->where('id', 1)->update($data);

        if ($a){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }
    
    public function getAbout() {
        $images = DB::table('about_gallery')
                ->select('about_gallery.*')
                ->get();
        $about = DB::table('about')
                ->select('about.*')
                ->where('id', 1)
                ->get();
        return view('admin.pages.about', compact('images','about'));
    }
    
    public function getPostImages(Request $request) {
        $image = $request->file('file');
        if ($image) {
            $destination = storage_path('uploads/about/');
            if (is_file($destination . "/{$image}")) {
                @unlink($destination . "/{$image}");
            }
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $image_path = "storage/uploads/about".'/'.$imageName;
            $data = array('image'=>$image_path);
            DB::table('about_gallery')->insert($data);
        }
    }

    public function addImages(Request $request) {
        $image = $request->file('file');
        if ($image) {
            $destination = storage_path('uploads/about/');
            $imageName = $image->getClientOriginalName();
            $image->move($destination, $imageName);
            $image_path = "storage/uploads/about".'/'.$imageName;
            $data = array('image'=>$image_path);
            DB::table('about_gallery')->insert($data);
        }
    }

    public function deleteImage(Request $request,$id)
    {
        $image = DB::table('about_gallery')
                ->select('about_gallery.image')
                ->where('id','=', $id)
                ->get();
        if (isset($id)) {
            $destination = storage_path('uploads/about'.$id.'/');
            if (is_file($destination . "/{$image}")) {
                @unlink($destination . "/{$image}");
            }
            DB::table('about_gallery')->where('id','=', $id)->delete();
            return back();
        }
    }
}
