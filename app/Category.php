<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Post;
use Auth;

class Category extends Model
{
   protected $table ='categories';
   
   public function Category(){
    return $this->belongsTo('App\User');
}
}
