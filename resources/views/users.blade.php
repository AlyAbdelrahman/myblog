@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="w3-card w3-round w3-white">
                          <div class="w3-container w3-padding">
        <h1>Users<h1>
            <table class="table">
                <thead>
                    <tr>
                        
                            <th>Name</th>
                    </tr>
                </thead>

<tbody>
        @foreach($users as $user)
        <tr>
            
                <td>{{$user->name}}</td>
              <!--  <td>
                        if(!Auth::guest())
                        if(Auth::user()->id==3)
                        <a type="button" class="w3-button w3-blue" href="/Pages/$user->id}}/edit">Edit</a>
                        
                        endif
                </td>-->
                <td>    
                        @if(!Auth::guest())
                        @if(Auth::user()->id==3)
                    {!! Form::open(['action' => ['UserController@destroy',$user->id],'method'=>'POST']) !!}

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
    @endsection