@extends('layouts.app')

@section('content')

    <h1>Registros de peso</h1>
    <table class="table is-fullwidth">
            <thead>
                <th class="">Data/Hora Registro</th>
                <th class="">Peso</th>
                <th class="">Ações</th>
            </thead>
            <tbody>
        @foreach ($registrosPeso as $registro)
        <tr>
                <th>{{$registro->created_at->format("d/m/Y H:i:s")}}</th> 
                <td>{{(str_replace('.', ',',$registro->peso))." ". $registro->unidade}}</td>
                <td>
                        <form action="/UsuarioPesoRegistros/{{$registro->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                                
                                <button class="delete" type="submit"></button>              
                               </form>
                            <span class="icon "onclick="location.href='/UsuarioPesoRegistros/{{$registro->id}}/edit'">
                                <i class="fas fa-edit"></i>
                              </span>
                        </td>
        </tr>
        @endforeach
            </tbody>
    
@endsection