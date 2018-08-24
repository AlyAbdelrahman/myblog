<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;
use Auth;

class Category extends Model
{
   protected $table ='categories';
   public function posts(){
       return $this->hasMany('App\Post');
   }
   public function Category(){
    return $this->belongsTo('App\User');
}
}
