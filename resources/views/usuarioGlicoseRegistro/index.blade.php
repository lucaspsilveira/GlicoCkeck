@extends('layouts.app')

@section('content')

    <h1>Registros de Glicose</h1>
    <ul>
        @foreach ($registrosGlicose as $registro)
            <li>{{$registro->created_at}}: {{$registro->glicose}} mg/dl</li>
        @endforeach
    </ul>
    
@endsection