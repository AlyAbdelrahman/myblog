@extends('layouts.app')

@section('content')

<h1>Create Post</h1>
{!! Form::open(['action' => 'PostsController@store','method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
            {{ Form::label('title','Title') }}
            {{ Form::text('title','' , ['class'=>'form-control','placeholder'=>'Title']) }}
        </div>

        <div class="form-group">
            {{ Form::label('category_id','Category') }}
            <select class="form-control" name="category_id">
                @foreach($categories as $category) 
            <option value={{$category->id}}>{{$category->name}}</option>
            @endforeach 

            </select>
        </div>

        <div class="form-group">
                {{ Form::label('body','Body') }}
                {{ Form::textarea('body','' , ['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body Text']) }}
            </div>

            <div class="form-group">        
                {{Form::File('cover_image')}}
            </div>






          {{form:: submit('Submit!')}} 
{!! Form::close() !!}

@endsection