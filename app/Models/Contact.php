<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    protected $fillable = ['message','name','email','subject','created_at','updated_at'];

    public  function scopeSelection($query){
        return $query->select('id','message','name','email','subject');

    }

}
