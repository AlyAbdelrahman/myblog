<?php

namespace App\Http\Controllers;

use App\Http\Resources\Post\PostResource;

use App\Http\Resources\Post\PostCollection ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Post;
use DB;
use App\User;
use App\Category;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth' , ['except'=>['index','show' ]]);
    }
    public function index()
    {
        return PostCollection::collection(Post::all());
 //$users=User::all();

        //$posts= Post::orderBy('id','desc')->paginate(10);
      
      return view ('posts.index') ->with('posts',$posts)->with('users',$users) ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view ('posts.create')->with('categories',$categories );
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //include error msg in the views wa kda ..
       $this ->validate($request,[
       'title'=>'required',
       'body'=>'required',
       'category_id'=>'required',
       'cover_image'=>'image|nullable|max:1999'

       ]);
       
       //handle file upload
       if($request->hasFile('cover_image')){
        //get filename with extension
        $filenameWithExt=$request->file('cover_image')->getClientOriginalName();
        //get just file name
        $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
        //GET JUST EX
        $extension=$request->file('cover_image')->getClientOriginalExtension();
        //filename to store
        $fileNameToStore=$filename.'_'.time().'.'.$extension;
        //upload image
        $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
       }
       else{
           $fileNameToStore='noimage.jpg';
             }
       $post = new Post;
       $post->title=$request->input('title');
       $post->body=$request->input('body');
       $post->category_id=$request->input('category_id');
       $post->cover_image=$fileNameToStore;
       $post->user_id=auth()->user()->id;
       $post->save();
       return redirect('/posts');// with post created sucsess
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return   new PostResource($post);
      
      
      //EL ATNEN DOL HOMA ele sa7 
      //  $post= Post::find($id); // post id
      //  $mypost=$post->category->name;






       // $categories=Category::where('id',);

       // $cat=$categories->where()
        //$c_id=$post->category_id;

      
        

      
       // $cp=$categories[$c_id]; /
        
       // $pc=$cp->name; // btrg3 category name
      //return $pc;  
      // return view ('posts.show')->with('post',$post)->with('pc',$pc);
      return view ('posts.show',compact('categories','post','mypost'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::find($id);
        $categories=Category::all();
        $cat=Category::find($id);
       // return $cat ;
   if(auth()->user()->id =3){
        return view ('posts.edit')->with('post',$post)->with('categories',$categories);}
//security from url
        if(auth()->user()->id !=$post->user_id ){
          return redirect ('/posts')->with('error','unauthorized');   
        }
     
    
    return view ('posts.edit')->with('post',$post)->with('categories',$categories);
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
            'title'=>'required',
            'body'=>'required',
            'category_id'=>'required'
     
            ]);
             //handle file upload
       if($request->hasFile('cover_image')){
        //get filename with extension
        $filenameWithExt=$request->file('cover_image')->getClientOriginalName();
        //get just file name
        $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
        //GET JUST EX
        $extension=$request->file('cover_image')->getClientOriginalExtension();
        //filename to store
        $fileNameToStore=$filename.'_'.time().'.'.$extension;
        //upload image
        $path=$request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
       }
       
            $categories=Category::find($id);
            $post =  Post::find($id);
            $post->title=$request->input('title');

            $post->body=$request->input('body');
            $post->category_id=$request->input('category_id');
            //Storage::delete('public/cover_images/' . $post->cover_image);
            if($request->hasFile('cover_image')){
                $post->cover_image=$fileNameToStore; 
            }
           
          
            $post->save();

        
            return redirect('/posts');
      
      
        //////////////////////////////////
     //this ->validate($request,[
            //'title'=>'required',
           // 'body'=>'required',
           // 'category_id'=>'required'
           // ]);
            //category = new Category;
           // category ->name =$request->name;
           // category ->save();
          //  $categories=Category::all();
          //  $post =Post::find($id);
          //  $post->title=$request->input('title');
          //  $post->body=$request->input('body');
          //  $post->category_id=$request->input('category_id');
          //  $post->save();
          //  return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =Post::find($id);
        if(auth()->user()->id !=$post->user_id){
            return redirect ('/posts')->with('error','unauthorized');   
          }
        
          Storage::delete('public/cover_images/' . $post->cover_image);
        $post->delete();
        return redirect('/posts');}

    }

