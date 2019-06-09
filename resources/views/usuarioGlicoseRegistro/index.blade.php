@extends('layouts.app')

@section('content')

    <h1>Registros de Glicose</h1>
    <table class="table is-fullwidth">
        <thead>
            <th class="">Data/Hora Registro</th>
            <th class="">Glicose</th>
            <th class="">Ações</th>
        </thead>
        <tbody>
            @foreach ($registrosGlicose as $registro)
            <tr>
                <th>{{$registro->created_at->format("d/m/Y H:i:s")}}</th> 
                <td>{{(str_replace('.', ',',$registro->glicose))}} mg/dl</td>
                <td>
                <form action="/UsuarioGlicoseRegistros/{{$registro->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        
                        <button class="delete" type="submit"></button>              
                       </form>
                    <span class="icon " onclick="location.href='/UsuarioGlicoseRegistros/{{$registro->id}}/edit'">
                        <i class="fas fa-edit"></i>
                      </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection