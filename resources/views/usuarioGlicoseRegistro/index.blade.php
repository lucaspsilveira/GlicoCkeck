@extends('layout')

@section('content')

    <h1>Olá mundo</h1>
    <ul>
        @foreach ($registrosGlicose as $registro)
            <li>{{$registro->id_usuario}} e {{$registro->glicose}}</li>
        @endforeach
    </ul>
    
@endsection