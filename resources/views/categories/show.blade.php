@extends('layouts.app')

@section('content')

<h1> {{$categories->name}} posts</h1>
@if(count($posts)>0)

@foreach($posts as $post)

<div class="card">

<h3 ><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>

<!-- el created msh radya tt7t .. hfkr feha tane -->
</div>

@endforeach

@endif

@endsection