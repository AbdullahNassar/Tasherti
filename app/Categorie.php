<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $fillable = ['image','cat_name_ar','cat_name_en','value','active'];
}
