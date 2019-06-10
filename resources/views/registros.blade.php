@extends('layouts.app')

@section('content')
<div class="tile is-ancestor">
        <div class="tile is-parent is-vertical">
            <h3 class="title">
                Olá {{Auth::user()->name}}
            </h3>
            <article onclick="location.href ='{{route('UsuarioGlicoseRegistros.index')}}'" class="tile is-child notification is-info">
                <p class="title">Visualizar Registros de Glicose</p>
                <p class="subtitle">Aqui você pode ver o que já foi registrado sobre sua glicose</p>
            </article>
            <article onclick="location.href ='{{route('UsuarioPressaoArterialRegistros.index')}}'" class="tile is-child notification is-info">
                    <p class="title">Visualizar Registros de pressão arterial</p>
                    <p class="subtitle">Aqui você pode ver o que já foi registrado sobre sua pressão arterial</p>
            </article>
        <article onclick="location.href ='{{route('UsuarioBatimentosRegistros.index')}}'" class="tile is-child notification is-info">
                <p class="title">Visualizar Registros de batimentos cardíacos</p>
                <p class="subtitle">Aqui você pode ver o que já foi registrado sobre seus batimentos cardíacos</p>
            </article>
            <article onclick="location.href ='{{route('UsuarioPesoRegistros.index')}}'" class="tile is-child notification is-info">
                <p class="title">Visualizar Registros de peso</p>
                <p class="subtitle">Aqui você pode ver o que já foi registrado sobre seu peso</p>
            </article>
        </div>
        {{-- <div class="tile">
            <!-- Add content or other tiles -->
        </div> --}}
    </div>
@endsection
