<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use DB;
use App\Category;
use Auth;



class PagesController extends Controller
{
  
    public function about(){
        return view('pages.about');
    }
    public function home(){
        return view ('pages.home');
    }
   
   
   
    public function services(){
        $data = array(
            'title'=>'services',
            'services' => ['news','jobs','offers']
        );
        return view ('pages.services')->with($data);
    }

}
