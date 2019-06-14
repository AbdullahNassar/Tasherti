<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostTrans extends Model
{
    //
    protected $fillable = ['head' ,'content' ,'lang' ,'post_id'];

    public function post(){
        return $this->belongsTo(Post::class ,'post_id');
    }
}
