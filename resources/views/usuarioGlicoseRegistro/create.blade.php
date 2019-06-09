@extends('layouts.app')

@section('content')
<form method="post" action="/UsuarioGlicoseRegistros">
    {{ csrf_field() }}
    <div class="field">
        <label class="label is-large">Valor da glicose</label>
        <div class="control">
            <input class="input is-large" id="glicose" min="0" pattern="[0-9]+([,\.][0-9]+)?" step="0.01" type="number" name="glicose" placeholder="Glicose"  title="O valor deve possuir no máximo até 2 casas decimais.">
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