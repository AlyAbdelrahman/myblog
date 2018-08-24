
@extends('layouts.app')

@section('content')

<h1>Edit Post</h1>
{!! Form::open(['action' => ['PostsController@update',$post->id ],'method'=>'POST','enctype'=>'multipart/form-data']) !!}
    <div class="form-group">
            {{ Form::label('title','Title') }}
            {{ Form::text('title',$post->title , ['class'=>'form-control','placeholder'=>'Title']) }}
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
                {{ Form::textarea('body',$post->body , ['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Body Text']) }}
            </div>
            
            {{form:: hidden('_method','PUT')}}
            <div class="form-group">        
                    {{Form::File('cover_image')}}
                </div>
          {{form:: submit('Submit!')}} 
{!! Form::close() !!}

@endsection