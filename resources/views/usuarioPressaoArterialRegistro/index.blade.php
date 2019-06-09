@extends('layouts.app')

@section('content')

    <h1>Registros de Pressão Arterial</h1>
        <table class="table">
                <thead>
                    <th class="">Data/Hora Registro</th>
                    <th class="">Pressão Arterial</th>
                    <th class="">Ações</th>
                </thead>
                <tbody>
                @foreach ($registrosPressaoArterial as $registro)
                    <tr>
                        <th>{{$registro->created_at->format("d/m/Y H:i:s")}}</th> 
                        <td>{{$registro->pressao_arterial_sistolica . "/". $registro->pressao_arterial_diastolica  }} mg/dl</td>
                        <td>
                
                                <form action="/UsuarioPressaoArterialRegistros/{{$registro->id}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        
                                        <button class="delete" type="submit"></button>              
                                       </form>
                                    <span class="icon "onclick="location.href='/UsuarioPressaoArterialRegistros/{{$registro->id}}/edit'">
                                        <i class="fas fa-edit"></i>
                                      </span>
                                </td>
                    </tr>
                @endforeach
                </tbody>
    
@endsection