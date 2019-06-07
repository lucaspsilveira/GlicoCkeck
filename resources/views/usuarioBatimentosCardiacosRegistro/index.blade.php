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
                        <th>{{$registro->created_at}}</th> 
                        <td>{{$registro->batimentos_cardiacos}} bpm</td>
                        <td>
                                <form action="/UsuarioBatimentosCardiacosRegistros/{{$registro->id}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        
                                        <button class="delete" type="submit"></button>              
                                       </form>
                                    <span class="icon " onclick="location.href=''">
                                        <i class="fas fa-edit"></i>
                                      </span>
                                </td>
                </tr>
                @endforeach
            </tbody>
    
@endsection