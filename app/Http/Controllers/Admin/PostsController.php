<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Cat;
use DB;

class PostsController extends Controller
{
    public function getIndex() {
    	$posts = Post::get();
        return view('admin.pages.post.index', compact('posts'));
    }

    public function getAdd() {
        $categories = Cat::all();
        return view('admin.pages.post.add', compact('categories'));
    }

    public function insert(Request $request) {
        $v = validator($request->all() ,[
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:20000',
            'head_ar' => 'required',
            'head_en' => 'required',
            'content_ar' => 'required',
            'content_en' => 'required',
            'cat_id' => 'required',
            'active' => 'required',
        ] ,[
            'image.required' => 'Please upload image',
            'image.image' => 'Please upload image not video',
            'image.mimes' => 'Image type : jpeg,jpg,png,gif',
            'image.max' => 'Max Size 20 MB',
            'head_ar.required' => 'Please Enter Post head_arer in English',
            'head_en.required' => 'Please Enter Post head_arer in Arabic',
            'content_ar.required' => 'Please Enter Post Content in English',
            'content_en.required' => 'Please Enter Post Content in Arabic',
            'cat_id.required' => 'Please Select Post Category',
            'active.required' => 'Please Enter Activation Status',
        ]);

        if ($v->fails()){
            return ['status' => false , 'data' => implode(PHP_EOL ,$v->errors()->all())];
        }

        $post = new Post();

        $post->active = $request->active;
        $post->cat_id = $request->cat_id;

        if ($request->image) {
            $post->image = $request->image->getClientOriginalName();
        }

        if ($post->save()){
            $post->details()->create([
                'head' => $request->head_en,
                'content' => $request->content_en,
                'lang' => 'en'
            ]);
            $post->details()->create([
                'head' => $request->head_ar,
                'content' => $request->content_ar,
                'lang' => 'ar'
            ]);

            return ['status' => 'succes' ,'data' => 'Data is inserted Successfully'];
        }

        return ['status' => false ,'data' => 'Something went wrong , please try again'];
        
    }

    public function getEdit($id) {
        if (isset($id)) {
            $post = Post::find($id);
            $c_id = $post->cat_id;
            $cat = Cat::find($c_id);
            $categories = Cat::all();
            return view('admin.pages.post.edit', compact('post','categories','cat'));
        }        
    }

    public function postEdit(Request $request) {
        $id = $request->input('s_id');
        $blog = Post::find($id);

        $blog->active = $request->active;
        $blog->cat_id = $request->cat_id;

        if ($request->image) {
            $blog->image = $request->image->getClientOriginalName();
        }

        $blog->english()->update([
            'head' => $request->head_en,
            'content' => $request->content_en
        ]);

        $blog->arabic()->update([
            'head' => $request->head_ar,
            'content' => $request->content_ar
        ]);

        if ($blog->save()){
            return ['status' => 'succes' ,'data' => 'Data is updated Successfully'];
        }

        return ['status' => false ,'data' => 'Something went wrong , please try again'];
    }

    public function delete($id) {
        if (isset($id)) {
            $blog = Post::find($id);

            $blog->details()->delete();
            $blog->delete();

            return redirect()->back();
        }
    }

}
