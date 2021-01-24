<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ='categories';
    protected $fillable = ['name','description','active','created_at','updated_at'];


    public function scopeActive($query)
    {
        return $query->where('active', 1);

    }

    public  function scopeSelection($query){
        return $query->select('id','name','description','active');

    }

    public function  getActive(){
        return $this -> active == 1 ? 'مفعل'  : 'غير مفعل';

    }
    public function news(){
        return $this->hasMany('App\Models\News','category_id','id');

    }

}
