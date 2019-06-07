@extends('layouts.app')

@section('content')
<form method="post" action="/UsuarioPesoRegistros/{{$registro->id}}">
    {{ csrf_field() }}
    @method("PATCH")
    <div class="field">
            <label class="label is-large">Data/Hora do registro</label>
            <div class="control">
            <input class="input is-large" type="text" name="created_at" placeholder="Data" value="{{$registro->created_at}}">
            </div>
        </div>
    <div class="field">
        <label class="label is-large">Peso</label>
        <div class="control">
        <input class="input is-large" type="text" name="peso" placeholder="Peso" value="{{$registro->peso}}">
        </div>
    </div>

    <div class="field">
            <label class="label is-large">Unidade</label>
            <div class="control">
            <div class="select is-large">
                <select name="unidade" class="input">
                    <option value="kg" <?php if($registro->unidade == "kg") { echo "selected";} else {echo "";} ?>>Quilogramas</option>
                    <option value="lbs" <?php if($registro->unidade == "lbs") { echo "selected";} else {echo "";} ?>>Libras</option>
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