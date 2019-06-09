@extends('layouts.app')

@section('content')
<div class="tile is-ancestor">
        <div class="tile is-parent is-vertical">
            <h3 class="title">
                Olá {{Auth::user()->name}}
            </h3>
            <article onclick="location.href ='UsuarioGlicoseRegistros/create'" class="tile is-child notification is-primary">
                <p class="title">Registrar glicose</p>
                <p class="subtitle">Registre seu nível de glicose</p>
            </article>
            <article onclick="location.href ='UsuarioPressaoArterialRegistros/create'" class="tile is-child notification is-primary">
                    <p class="title">Registrar pressão arterial</p>
                    <p class="subtitle">Registre sua pressão arterial</p>
            </article>
            <article onclick="location.href ='UsuarioBatimentosRegistros/create'" class="tile is-child notification is-primary">
                    <p class="title">Registrar batimentos cardíacos</p>
                    <p class="subtitle">Registre seus batimentos cardíacos</p>
            </article>
            <article onclick="location.href ='UsuarioPesoRegistros/create'" class="tile is-child notification is-primary">
                    <p class="title">Registrar Peso</p>
                    <p class="subtitle">Registre seu peso</p>
            </article>
        </div>
        {{-- <div class="tile">
            <!-- Add content or other tiles -->
        </div> --}}
    </div>
@endsection
