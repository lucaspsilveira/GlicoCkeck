@extends('layout')

@section('content')

    <h1>Olá mundo</h1>
    <ul>
        @foreach ($users as $user)
            <li>{{$user->name}}</li>
        @endforeach
    </ul>
    
@endsection