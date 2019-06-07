@extends('layouts.app')

@section('content')
<form method="post" action="/UsuarioGlicoseRegistros">
    {{ csrf_field() }}
    <div class="field">
        <label class="label is-large">Valor da glicose</label>
        <div class="control">
            <input class="input is-large" type="text" name="glicose" placeholder="Glicose">
        </div>
    </div>
    <div class="field">
        <div class="control">
            <button class="button is-primary">
            Registrar Glicose
            </button>
        </div>
        </div>
</form>
@endsection