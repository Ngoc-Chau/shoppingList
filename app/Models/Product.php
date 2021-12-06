<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="products";
    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }
    public function category(){
        return $this->belongsTo('App\Models\Category','cat_id','id');
    }
}
