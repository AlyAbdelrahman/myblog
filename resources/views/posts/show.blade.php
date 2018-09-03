@extends('layouts.app')

@section('content')
<div class="w3-card w3-round w3-white" >
        <div class="w3-container w3-padding">

<h1>{{$post->title ? $post->title : "no title"}}</h1>

<div>
        <img style="width:100%  " src="/storage/cover_images/{{$post->cover_image}}">
        <br><br>
    {!!$post->body ? $post->body : "no body"!!}
    

<small>Written on {{$post->created_at ? $post->created_at : " "}} <br> by {{$post->user->name ? $post->user->name : "no user"}}  To category {{ $mypost }} </small>


</div>
<hr>
<!-- msh 3arf ashel el categorie -->

<br>
<br>
@if(!Auth::guest())
@if(Auth::user()->id==$post->user_id || Auth::user()->id==3)

<a type="button" class="btn btn-primary" href="/posts">Go Back</a>
<a type="button" class="btn btn-primary" href="/posts/{{$post->id}}/edit">Edit</a>
<hr>

{!! Form::open(['action' => ['PostsController@destroy',$post->id ],'method'=>'POST']) !!}

{{form:: hidden('_method','DELETE')}}
{{form:: submit('Delete'),['class'=>'btn btn-danger ']}} 
{!! Form::close() !!}


@endif
@endif
        </div>
</div>
@endsection