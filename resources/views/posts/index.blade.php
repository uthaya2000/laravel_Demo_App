@extends('layouts.main')

@section('content')
    <div class="container">
        @if(count($posts)>0)

            <ul class="list-group mt-5 mb-5">
                @foreach($posts as $post)
                    <li class="list-group-item">
                        <a href="/posts/{{$post->id}}">{{$post->Name}}</a>
                    </li>
                @endforeach
            </ul>
        @else
            <h1>No student found</h1>
        @endif
       
        <a href="/posts/create/" class="btn btn-dark mt-3">ADD Student</a>
    </div>
    
@endsection