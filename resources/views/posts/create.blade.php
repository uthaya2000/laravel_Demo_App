@extends('layouts.main')

@section('content')
    <div class="container">
        <h1>Student Form</h1>
    {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype'=>'multipart/form-data']) !!}
        <div class="mb-3">
             {{Form::label('name', 'Student Name', ['class' => 'form-label'])}}
             {{Form::text('name', '', ['class'=>'form-control'])}}
        </div>
        <div class="mb-3">
             {{Form::label('age', 'Age', ['class' => 'form-label'])}}
             {{Form::number('age', '', ['class'=>'form-control'])}}
        </div>
        <div class="mb-3">
            {{Form::file('profile-pic')}}
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    {!! Form::close() !!}
    </div>
    
@endsection