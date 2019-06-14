<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programme extends Model
{
    protected $fillable = ['name_ar','name_en','content_ar','content_en','pack_id','active'];
}
