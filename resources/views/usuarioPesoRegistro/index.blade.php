@extends('layouts.app')

@section('content')

    <h1>Olá mundo</h1>
    <ul>
        @foreach ($registrosPeso as $registro)
            <li>{{$registro->id_usuario}} e {{$registro->peso}}</li>
        @endforeach
    </ul>
    
@endsection