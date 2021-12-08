<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table="categorys";
    public function products(){
        return $this->hasMany('App\Models\Product','cat_id','id');
    }
}
