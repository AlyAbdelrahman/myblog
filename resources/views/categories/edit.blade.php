
@extends('layouts.app')

@section('content')

<h1>Edit This Category</h1>
{!! Form::open(['action' => ['CategoryController@update',$category->id ],'method'=>'POST']) !!}
    <div class="form-group">
            {{ Form::label('name','category') }}
            {{ Form::text('name',$category->name , ['class'=>'form-control','placeholder'=>'']) }}
        </div>

        {{form:: hidden('_method','PUT')}}
          {{form:: submit('Submit!')}} 
{!! Form::close() !!}


@endsection