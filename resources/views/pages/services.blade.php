@extends('layouts.main')

@section('content')
    <h1>{{$data['title']}}</h1>
    <ul>
        @if(count($data['services'])>0)
            @foreach ($data['services'] as $item)
                <li>{{$item}}</li>
            @endforeach
        @endif
    </ul>
@endsection