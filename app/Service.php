<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['image','name_ar','name_en','content_ar','content_en','price','rate','active'];
}
