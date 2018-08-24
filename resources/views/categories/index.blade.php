@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="w3-card w3-round w3-white">
                          <div class="w3-container w3-padding">
        <h1>Categories<h1>
            <table class="table">
                <thead>
                    <tr>
                        
                            <th>Name</th>
                    </tr>
                </thead>

<tbody>
        @foreach($categories as $category)
        <tr>
            
                <td><a href="/categories/{{$category->id}}">{{$category->name}}</td>
                <td>
                        @if(!Auth::guest())
                        @if(Auth::user()->id==3)
                        <a type="button" class="w3-button w3-blue" href="/categories/{{$category->id}}/edit">Edit</a>
                        @endif
                        @endif
                </td>
                <td>    
                        @if(!Auth::guest())
                        @if(Auth::user()->id==3)
                        {!! Form::open(['action' => ['CategoryController@destroy',$category->id ],'method'=>'POST']) !!}

                        {{form:: hidden('_method','DELETE')}}
                        {{Form::button(' DELETE', array(
                            'type' => 'submit',
                            'class'=> "w3-button w3-red",
                            
                    ))}} 
                        {!! Form::close() !!}
                        @endif
                        @endif
                    <td>
        </tr>
        
        @endforeach
        
                </tbody>
                </table>
            </div>
        </div>
    </div>
    @if(Auth::user()->id==3)
            <div class="col-md-4">
    
                    <div class="w3-row-padding">
                      <div class="w3-col m12">
                        <div class="w3-card w3-round w3-white">
                          <div class="w3-container w3-padding">
                            <h6 class="w3-opacity">Add New Category !</h6>


                            {!! Form::open(['action' => 'CategoryController@store','method'=>'POST']) !!}
                            {{ Form::label('name','Name it :') }}
                            {{ Form::text('name','' , ['class'=>'form-control','placeholder'=>'']) }}
                        
                           {{form:: submit('Submit!',['class'=>'w3-btn w3-round-xlarge'],['type'=>'button'])}} <i class="fa fa-pencil"></i> 
                              {!! Form::close() !!}





                          </div>
                        </div>
                      </div>
                    </div>
                 </div>
                 @endif
                </div>
            </div>
        </div>

    @endsection