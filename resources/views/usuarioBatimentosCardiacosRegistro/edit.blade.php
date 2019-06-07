@extends('layouts.app')

@section('content')
<form method="post" action="/UsuarioBatimentosRegistros/{{$registro->id}}">
    {{ csrf_field() }}
    @method("PATCH")
    <div class="field">
            <label class="label is-large">Data/Hora do registro</label>
            <div class="control">
            <input class="input is-large" type="text" name="created_at" placeholder="Data" value="{{$registro->created_at}}">
            </div>
        </div>
    <div class="field">
        <label class="label is-large">Batimentos Cardíacos</label>
        <div class="control">
            <input class="input is-large" type="text" name="batimentos_cardiacos" placeholder="Batimentos Cardíacos" value="{{$registro->batimentos_cardiacos}}">
        </div>
    </div>
    <div class="field">
        <div class="control">
            <button class="button is-primary">
            Atualizar batimentos cardíacos
            </button>
        </div>
        </div>
</form>
@endsection