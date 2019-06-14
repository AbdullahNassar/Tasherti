<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = ['image','pack_name_ar','pack_name_en','content_ar','content_en','desc_ar','desc_en','appoint_ar','appoint_en','start_ar','start_en','end_ar','end_en','price','active','h_show','s_show','service_id','category_id','rate'];
}
