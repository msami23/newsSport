<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = ['category_id','title','description','topic','image','created_at','updated_at'];

    protected $hidden =['category_id'];

    public  function scopeSelection($query){
        return $query->select('id','category_id','title','description','topic','image');

    }

    public function getImageAttribute($val)
    {
        return ($val !== null) ? asset($val) : "";

    }
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id','id');

    }
}
