@extends('layouts.app')

@section('content')

    <h1>Olá mundo</h1>
    <ul>
        @foreach ($registrosPressaoArterial as $registro)
    <li>{{$registro->id_usuario}} : Sistólica: {{$registro->pressao_arterial_sistolica}}, Diastólica: {{$registro->pressao_arterial_diastolica}}</li>
        @endforeach
    </ul>
    
@endsection