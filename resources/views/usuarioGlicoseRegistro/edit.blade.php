@extends('layouts.app')

@section('content')
<form method="post" action="/UsuarioGlicoseRegistros/{{$registro->id}}">
    {{ csrf_field() }}
    @method("PATCH")
    <div class="field">
            <label class="label is-large">Data/Hora do registro</label>
            <div class="control">
            <input class="input is-large" type="text" name="created_at" placeholder="Glicose" value="{{$registro->created_at}}">
            </div>
        </div>
    <div class="field">
        <label class="label is-large">Valor da glicose</label>
        <div class="control">
        <input class="input is-large" type="text" name="glicose" placeholder="Glicose" value="{{$registro->glicose}}">
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