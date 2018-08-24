<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
class Post extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }
    // public function category(){
    //     return $this->hasMany('App\Category');
    // }
    public function category(){
        return $this->belongsTo('App\Category');
    }
}
