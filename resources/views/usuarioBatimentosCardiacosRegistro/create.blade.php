@extends('layouts.app')

@section('content')
<form method="post" action="/UsuarioBatimentosRegistros">
    {{ csrf_field() }}
    <div class="field">
        <label class="label is-large">Batimentos Cardíacos</label>
        <div class="control">
            <input class="input is-large" type="text" name="batimentos_cardiacos" placeholder="Batimentos Cardíacos">
        </div>
    </div>
    <div class="field">
        <div class="control">
            <button class="button is-primary">
            Registrar batimentos cardíacos
            </button>
        </div>
        </div>
</form>
@endsection