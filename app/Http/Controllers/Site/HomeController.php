<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Notifications\notify_me;
use App\Notifications\notify;
use Illuminate\Http\Request;
use App\Categorie;
use App\Package;
use App\Service;
use App\Subscriber;
use App\Contact;
use App\Storie;
use App\Slider;
use App\Post;
use App\Team;
use App\Data;
use App\User;
use App\Cat;
use Location;
use Auth;
use DB;

class HomeController extends Controller {

    public function getIndex() {
        $ip = $_SERVER['REMOTE_ADDR'];
        $location = Location::get($ip);
        //dd($location);
        DB::table('visits')->insert(array('country' => $location->countryCode));
        $sliders = Slider::all()->where('active','=',1);
        $services = Service::all()->where('active','=',1);
        $stories = Storie::all()->where('active','=',1);
        $posts = Post::all()->where('active','=',1);
        $cats = Categorie::all()->where('active','=',1);
        $packages = DB::table('packages')
                ->join('categories','packages.category_id','=','categories.cat_id')
                ->select('packages.*','categories.value')
                ->where('packages.active','=',1)
                ->where('packages.h_show','=',1)
                ->get();
        $gallery = DB::table('gallery')
                ->select('gallery.*')
                ->where('active','=',1)
                ->get();
        $images = DB::table('about_gallery')
                ->select('about_gallery.*')
                ->get();
        $contact = new Contact;
        $data = new Data;

        return view('site.pages.home',compact('sliders','contact','data','services','stories','posts','cats','packages','gallery','images'));
    }

    public function getAbout() {
        
        $services = Service::all()->where('active','=',1);
        $stories = Storie::all()->where('active','=',1);
        $gallery = DB::table('gallery')
                        ->select('gallery.*')
                        ->where('active','=',1)
                        ->get();
        $contact = new Contact;
        $data = new Data;

        return view('site.pages.about',compact('data','stories','contact','services','gallery'));
    }

    public function getServices() {
            $data = new Data;
            $services = Service::all()->where('active','=',1);
            $contact = new Contact; 
            $packages = Package::all()->where('active','=',1)
                                      ->where('s_show','=',1);       
        return view('site.pages.services',compact('data','contact','services','cats','categories','packages'));
    }

    public function getPackages() {
        
        $data = new Data;
        $packages = Package::all()->where('active','=',1);
        $contact = new Contact;
        $services = Service::all()->where('active','=',1);

        return view('site.pages.packages',compact('data','contact','packages','services'));
    }

    public function getPacks($id) {
        
        $data = new Data;
        $packages = Package::all()->where('active','=',1)->where('service_id','=',$id);
        $contact = new Contact;
        $services = Service::all()->where('active','=',1);

        return view('site.pages.packages',compact('data','contact','packages','services'));
    }

    public function getPackage($id) {
        if(isset($id)){
            
            $packages = DB::table('packages')
                ->join('categories','packages.category_id','=','categories.cat_id')
                ->join('services','packages.service_id','=','services.id')
                ->select('packages.*','categories.cat_name_en','categories.cat_name_ar')
                ->where('packages.pack_id','=', $id)
                ->get();
            $images = DB::table('pimages')
                ->select('pimages.*')
                ->where('package_id','=', $id)
                ->get();
            $programmes = DB::table('programmes')
                ->select('programmes.*')
                ->where('packages_id','=', $id)
                ->get();
            $packs = Package::all()->where('active','=',1);
            $services = Service::all()->where('active','=',1);
            $pack = DB::table('packages')->select('packages.views')->where('pack_id', $id)->first()->views;
            $p = $pack + 1;
            $data = array('views' => $p);
            $r = DB::table('packages')->where('pack_id','=', $id)->update($data);
            $data = new Data;
            $contact = new Contact;
            return view('site.pages.package',compact('data','contact','packages','images','services','programmes','packs'));
        }
    }

    public function getGallery() {
        
        $data = new Data;
        $gallery = DB::table('gallery')
                ->select('gallery.*')
                ->where('active','=',1)
                ->get();
        $contact = new Contact;
        $services = Service::all()->where('active','=',1);

        return view('site.pages.gallery',compact('data','contact','gallery','services'));
    }

    public function getPosts() {
        
        $data = new Data;
        $posts = Post::all()->where('active','=',1);
        $contact = new Contact;
        $categories = Cat::all()->where('active','=',1);
        $services = Service::all()->where('active','=',1);

        return view('site.pages.posts',compact('data','contact','posts','categories','services'));
    }

    public function cPosts($id) {
        
        $data = new Data;
        $posts = Post::find($id);
        $contact = new Contact;
        $categories = Cat::all()->where('active','=',1);
        $services = Service::all()->where('active','=',1);

        return view('site.pages.posts',compact('data','contact','posts','categories','services'));
    }

    public function search(Request $request) {
        $search = $request->input('search');
        $data = new Data;
        $posts = DB::table('posts')
                ->join('cats','posts.cat_id','=','cats.c_id')
                ->select('posts.*','cats.*')
                ->where('posts.head_ar', 'like', '%' . $search . '%')
                ->orWhere('posts.head_en', 'like', '%' . $search . '%')
                ->orWhere('posts.content_ar', 'like', '%' . $search . '%')
                ->orWhere('posts.content_en', 'like', '%' . $search . '%')
                ->orWhere('cats.c_name_ar', 'like', '%' . $search . '%')
                ->orWhere('cats.c_name_en', 'like', '%' . $search . '%')
                ->get();
        $contact = new Contact;
        $categories = Cat::all()->where('active','=',1);
        $services = Service::all()->where('active','=',1);

        return view('site.pages.posts',compact('data','contact','posts','categories','services'));
    }

    public function getPost($id) {
        if(isset($id)){
            $data = new Data;
            $posts = DB::table('posts')
                    ->join('cats','posts.cat_id','=','cats.c_id')
                    ->select('posts.*','cats.*')
                    ->where('posts.id','=', $id)
                    ->get();
            $comments = DB::table('comments')
                    ->join('posts','comments.co_id','=','posts.id')
                    ->select('posts.*','comments.*')
                    ->where('comments.post_id','=', $id)
                    ->get();
            $contact = new Contact;
            $categories = Cat::all()->where('active','=',1);
            $services = Service::all()->where('active','=',1);
            return view('site.pages.post',compact('data','contact','posts','categories','services','comments'));
        }
        
    }

    public function getContact() {
        
        $data = new Data;
        $contact = new Contact;
        $services = Service::all()->where('active','=',1);

        return view('site.pages.contact',compact('data','contact','services'));
    }

    public function message(Request $request)
    {
        $v = validator($request->all() ,[
            'name' => 'required|min:6',
            'message' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required'
        ] ,[
            'name.required' => 'Please Enter Your Full Name',
            'email.required' => 'Please Enter Your Email Address',
            'message.required' => 'Please Enter Your Message',
            'phone.required' => 'Please Enter Your Phone Number',
            'subject.required' => 'Please Enter Subject',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $id = $request->input('s_id');
        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $message = $request->input('message');
        $subject = $request->input('subject');
        $data = array('name'=>$name,'email'=>$email,'phone'=>$phone,'subject'=>$subject,'message'=>$message);

        $m = DB::table('messages')->insert($data);

        if ($m) {
            if (Auth::guard('admins')->check()){
                Auth::guard('admins')->user()->notify(new notify_me());
            }
            return ['status' => 'succes' ,'data' => 'Your Message is sent Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function comment(Request $request)
    {
        $v = validator($request->all() ,[
            'name' => 'required|min:6',
            'message' => 'required',
            'email' => 'required|email',
        ] ,[
            'name.required' => 'Please Enter Your Full Name',
            'email.required' => 'Please Enter Your Email Address',
            'message.required' => 'Please Enter Your Message',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $id = $request->input('s_id');
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');
        $data = array('name'=>$name,'email'=>$email,'comment'=>$message,'post_id'=>$id);

        $m = DB::table('comments')->insert($data);

        if ($m) {
            return ['status' => 'succes' ,'data' => 'Your Comment is sent Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function reply(Request $request)
    {
        $v = validator($request->all() ,[
            'name' => 'required|min:6',
            'message' => 'required',
            'email' => 'required|email',
        ] ,[
            'name.required' => 'Please Enter Your Full Name',
            'email.required' => 'Please Enter Your Email Address',
            'message.required' => 'Please Enter Your Message',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $id = $request->input('s_id');
        $c_id = $request->input('c_id');
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');
        $data = array('name'=>$name,'email'=>$email,'comment'=>$message,'post_id'=>$id,'comment_id'=>$c_id);

        $m = DB::table('replies')->insert($data);

        if ($m) {
            return ['status' => 'succes' ,'data' => 'Your Comment is sent Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

    public function subscribe(Request $request)
    {
        $v = validator($request->all() ,[
            'subscribe' => 'required|email|unique:subscribers,email',
        ] ,[
            'subscribe.required' => 'Please Enter Your E-mail Address',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }
        $subscribe = $request->input('subscribe');
        $data = array('email'=>$subscribe);
        $subscriber = Subscriber::create($data); 
        if ($subscriber){
            return ['status' => 'succes' ,'data' => 'You Subscribed Successfully'];
        }
        return ['status' => 'error' ,'data' => 'Something went wrong , please try again'];
    }

    public function reserve(Request $request)
    {
        $v = validator($request->all() ,[
            'name' => 'required|min:6',
            'address' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'package' => 'required'
        ] ,[
            'name.required' => 'Please Enter Your Full Name',
            'email.required' => 'Please Enter Your Email Address',
            'address.required' => 'Please Enter Your Address',
            'phone.required' => 'Please Enter Your Phone Number',
            'package.required' => 'Please Select Package',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $address = $request->input('address');
        $package = $request->input('package');
        $data = array('name'=>$name,'email'=>$email,'phone'=>$phone,'address'=>$address,'package'=>$package);

        $m = DB::table('reservations')->insert($data);

        if ($m) {
            if (Auth::guard('admins')->check()){
                Auth::guard('admins')->user()->notify(new notify());
            }
            return ['status' => 'succes' ,'data' => 'Your Reservation is sent Successfully'];
        }else{
            return ['status' => false ,'data' => 'Something went wrong , please try again'];
        }
    }

}
