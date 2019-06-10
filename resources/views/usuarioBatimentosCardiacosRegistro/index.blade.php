@extends('layouts.app')

@section('content')

    <h1>Registros de batimentos cardíacos</h1>
    <table class="table is-fullwidth">
            <thead>
                <th class="">Data/Hora Registro</th>
                <th class="">Glicose</th>
                <th class="">Ações</th>
            </thead>
            <tbody>
                @foreach ($registrosBatimentosCardiacos as $registro)
                <tr>
                        <th>{{$registro->created_at->format("d/m/Y H:i:s")}}</th> 
                        <td>{{(str_replace('.', ',',$registro->batimentos_cardiacos))}} bpm</td>
                        <td>
                                <form action="/UsuarioBatimentosRegistros/{{$registro->id}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        
                                        <button class="delete" type="submit"></button>              
                                       </form>
                                    <span class="icon " onclick="location.href='/UsuarioBatimentosRegistros/{{$registro->id}}/edit'">
                                        <i class="fas fa-edit"></i>
                                      </span>
                                </td>
                </tr>
                @endforeach
            </tbody>
    
@endsection