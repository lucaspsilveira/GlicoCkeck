@extends('layouts.app')

@section('content')
<form method="post" action="/UsuarioPressaoArterialRegistros">
    {{ csrf_field() }}
    <div class="field">
        <label class="label is-large">Pressão sistólica (valor maior)</label>
        <div class="control">
            <input class="input is-large" pattern="[0-9]+([,\.][0-9]+)?" max="300" min="0" type="number" name="pressao_arterial_sistolica" placeholder="Pressão Arterial Sistólica">
        </div>
    </div>
    <div class="field">
            <label class="label is-large">Pressão diastólica (valor menor)</label>
            <div class="control">
                <input class="input is-large" pattern="[0-9]+([,\.][0-9]+)?"  max="300" min="0" type="number" name="pressao_arterial_diastolica" placeholder="Pressão Arterial Diastólica">
            </div>
        </div>
    <div class="field">
        <div class="control">
            <button class="button is-primary">
            Registrar pressão arterial
            </button>
        </div>
        </div>
</form>
@endsection