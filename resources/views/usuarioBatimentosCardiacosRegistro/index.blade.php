@extends('layouts.app')

@section('content')

    <h1>Registros de batimentos cardíacos</h1>
    <ul>
        @foreach ($registrosBatimentosCardiacos as $registro)
            <li>{{$registro->created_at}}: {{$registro->batimentos_cardiacos}} bpm</li>
        @endforeach
    </ul>
    
@endsection