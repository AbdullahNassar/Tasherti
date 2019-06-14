<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function details(){
        return $this->hasMany(PostTrans::class ,'post_id');
    }

    public function translated(){
        return $this->details()->where('lang' ,app()->getLocale())->first();
    }

    public function arabic(){
        return $this->details()->where('lang' ,'ar')->first();
    }

    public function english(){
        return $this->details()->where('lang' ,'en')->first();
    }

    public function cat(){
        return $this->belongsTo(Cat::class ,'cat_id');
    }

}
