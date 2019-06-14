<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['image','head1_ar','head1_en','head2_ar','head2_en','content_ar','content_en','active'];
}
