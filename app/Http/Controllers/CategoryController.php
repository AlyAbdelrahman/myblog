<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\User;
use Session;
use Auth;
use App\Post;
use DB ;
class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view ('categories.index')->with('categories',$categories);
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this ->validate($request,[
            'name'=>'required |max :255'
            ]);
           $category = new Category;
            $category->name = $request->name;
            //$category->user_id=$request->auth()->user()->id;
            $category->user_id=Auth::user()->id;
            $category->save();
           
            Session::flash('sucess','New Category has been created');
            return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $postss =Post::all();
    $categories = Category::find($id);
        
        $posts= DB::table('posts')->where('category_id',$id)->get();
        
        return view('categories.show')->with('posts',$posts)->with('categories',$categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::all();
        $cat=Category::find($id);
        return view ('categories.edit')->with('categories',$categories)->with('category',$cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
           'name'=>'required |nullable'

            ]);
          $category =  Category::find($id);
          
           $category->name = $request->name;
           
            // $user=User::all();
            // return $user->id;
            //category->user_id=$request->auth()->user()->id;
           // $category->user_id=$user;
            $category->save();
           
           return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $posts=Post::all();
        $post = DB::table('posts')->where('category_id',$id);
        $post->delete();
        $category->delete();
        return redirect('categories');}
    }

