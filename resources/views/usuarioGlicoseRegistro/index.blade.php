@extends('layouts.app')

@section('content')

    <h1>Registros de Glicose</h1>
    <table class="table">
        <thead>
            <th class="">Data/Hora Registro</th>
            <th class="">Glicose</th>
            <th class="">Ações</th>
        </thead>
        <tbody>
            @foreach ($registrosGlicose as $registro)
            <tr>
                <th>{{$registro->created_at}}</th> 
                <td>{{$registro->glicose}} mg/dl</td>
                <td>
                
                <form action="/UsuarioGlicoseRegistros/{{$registro->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        
                        <button class="delete" type="submit"></button>              
                       </form>
                    <span class="icon ">
                        <i class="fas fa-edit"></i>
                      </span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
@endsection