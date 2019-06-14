<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable = ['c_name_ar','c_name_en','active'];

    public function post(){
        return $this->hasMany(Post::class ,'cat_id');
    }
}
