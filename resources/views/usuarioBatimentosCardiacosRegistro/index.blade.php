@extends('layouts.app')

@section('content')

    <h1>Olá mundo</h1>
    <ul>
        @foreach ($registrosBatimentosCardiacos as $registro)
            <li>{{$registro->id_usuario}} e {{$registro->batimentos_cardiacos}}</li>
        @endforeach
    </ul>
    
@endsection