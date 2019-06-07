@extends('layouts.app')

@section('content')
<form method="post" action="/UsuarioPressaoArterialRegistros/{{$registro->id}}">
    {{ csrf_field() }}
    @method("PATCH")
    <div class="field">
            <label class="label is-large">Data/Hora do registro</label>
            <div class="control">
            <input class="input is-large" type="text" name="created_at" placeholder="Data" value="{{$registro->created_at}}">
            </div>
        </div>
    <div class="field">
        <label class="label is-large">Pressão sistólica (valor maior)</label>
        <div class="control">
            <input class="input is-large" type="text" name="pressao_arterial_sistolica" placeholder="Pressão Arterial Sistólica" value="{{$registro->pressao_arterial_sistolica}}">
        </div>
    </div>
    <div class="field">
            <label class="label is-large">Pressão diastólica (valor menor)</label>
            <div class="control">
                <input class="input is-large" type="text" name="pressao_arterial_diastolica" placeholder="Pressão Arterial Diastólica" value="{{$registro->pressao_arterial_diastolica}}">
            </div>
        </div>
    <div class="field">
        <div class="control">
            <button class="button is-primary">
            Atualizar pressão arterial
            </button>
        </div>
        </div>
</form>
@endsection