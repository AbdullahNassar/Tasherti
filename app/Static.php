<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Static extends Model
{
    protected $fillable = ['about_image1','about_image2','about_content_ar','about_content_en','why_ar','why_en'
        ,'block1_ar','block1_en','b1_content_ar','b1_content__en','block2_ar','block2_en','b2_content_ar'
        ,'b2_content_en','block3_ar','block3_en','b3_content_ar','b3_content_en','block4_ar','block4_en'
        ,'b4_content_ar','b4_content_en','why_image','services_ar','services_en','services_content_ar'
        ,'services_content_en','contact_ar','contact_en','footer_ar','footer_en','footer_content_ar'
        ,'footer_content_en','button_ar','button_en'];

    public function get($value)
    {
        $data = DB::table('statics')
            ->select($value)
            ->first();

    if($data)
        return $data->$value;
    return '';
    }
}
