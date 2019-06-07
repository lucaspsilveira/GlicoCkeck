@extends('layouts.app')

@section('content')

    <h1>Registros de Pressão Arterial</h1>
    <ul>
        @foreach ($registrosPressaoArterial as $registro)
    <li>{{$registro->created_at}} : Sistólica: {{$registro->pressao_arterial_sistolica}}, Diastólica: {{$registro->pressao_arterial_diastolica}}</li>
        @endforeach
    </ul>
    
@endsection