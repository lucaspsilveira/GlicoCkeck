@extends('layouts.app')

@section('content')

    <h1>Registros de peso</h1>
    <ul>
        @foreach ($registrosPeso as $registro)
            <li>{{$registro->created_at}}: {{$registro->peso." ". $registro->unidade}}</li>
        @endforeach
    </ul>
    
@endsection