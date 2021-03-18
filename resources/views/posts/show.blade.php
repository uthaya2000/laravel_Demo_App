@extends('layouts.main')

@section('content')
    <div class="container">
        <img src="/storage/profile_images/{{$post->profile_pic}}" class="img-thumbnail d-flex justify-content-center" alt="...">
        <ul class="list-group mt-5">
        <li class="list-group-item d-flex justify-content-center">
            <h1 class="display-5">{{$post->Name}}</h1>
            
        </li>
        <li class="list-group-item d-flex justify-content-center">
            <h4 class="display-6">{{$post->age}}</h4>
        </li>
        </ul>
        <a href="/posts/{{$post->id}}/edit" class="btn btn-info mt-5">Edit</a>
        {!! Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST']) !!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class'=> 'btn btn-danger mt-3'])}}
        {!! Form::close() !!}
    </div>
    
@endsection