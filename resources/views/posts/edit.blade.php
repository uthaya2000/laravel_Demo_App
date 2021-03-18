@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Student Edit Form</h1>
    {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST']) !!}
        <div class="mb-3">
             {{Form::label('name', 'Student Name', ['class' => 'form-label'])}}
             {{Form::text('name', $post->Name, ['class'=>'form-control'])}}
        </div>
        <div class="mb-3">
             {{Form::label('age', 'Age', ['class' => 'form-label'])}}
             {{Form::number('age', $post->age, ['class'=>'form-control'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        <button type="submit" class="btn btn-primary">Submit</button>
    {!! Form::close() !!}
    </div>
    
@endsection