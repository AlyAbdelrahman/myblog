@extends('layouts.app')

@section('content')


<h1>{{$post->title ? $post->title : "no title"}}</h1>

<div>
        <img style="width:100%  " src="/storage/cover_images/{{$post->cover_image}}">
        <br><br>
    {!!$post->body ? $post->body : "no body"!!}
</div>
<hr>
<!-- msh 3arf ashel el categorie -->
<small>Written on {{$post->created_at ? $post->created_at : " "}} <br> by {{$post->user->name ? $post->user->name : "no user"}}  To category {{ $mypost }} </small>

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

@endsection