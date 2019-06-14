<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storie extends Model
{
    protected $fillable = ['image','name_ar','name_en','content_ar','content_en','position_ar','position_en','active'];
}
