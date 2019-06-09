@extends('layouts.app')

@section('content')
<form method="post" action="/UsuarioPesoRegistros">
    {{ csrf_field() }}
    <div class="field">
        <label class="label is-large">Peso</label>
        <div class="control">
            <input class="input is-large" pattern="[0-9]+([,\.][0-9]+)?" step="0.01" min="0" type="number" name="peso" placeholder="Peso">
        </div>
    </div>

    <div class="field">
            <label class="label is-large">Unidade</label>
            <div class="control">
            <div class="select is-large">
                <select name="unidade" class="input">
                    <option value="kg" selected>Quilogramas</option>
                    <option value="lbs">Libras</option>
                </select>
            </div>
            </div>
        </div>

    <div class="field">
        <div class="control">
            <button class="button is-primary">
            Registrar Peso
            </button>
        </div>
        </div>
</form>
@endsection