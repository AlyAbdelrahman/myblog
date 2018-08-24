@extends('layouts.app')
<style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        
        tr:nth-child(even) {
            background-color: #dddddd;
        }
        </style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <a href="/posts/create" class="btn btn-primary">Create Post </a>
                    <h1> your Blog Posts </h1>
                    @if(count($posts)>0)
                    <table class="table table-striped">
                        @foreach($posts as $post )
                            <tr>
                                <td><a href="/posts/{{$post->id}}">{{$post->title}}</a></td>
                              <td><a type="button" class="btn btn-primary" href="/posts/{{$post->id}}/edit">Edit</a></td>
                           <td> {!! Form::open(['action' => ['PostsController@destroy',$post->id ],'method'=>'POST']) !!}

                                {{form:: hidden('_method','DELETE')}}
                                {{form:: submit('Delete'),['class'=>'btn btn-primary ']}} 
                                {!! Form::close() !!}
                           </td >
                          
                            </tr>
                           @endforeach 
                           @else
                                <p>you have no posts </p>
                           @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
