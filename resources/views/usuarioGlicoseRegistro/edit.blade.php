@extends('layouts.app')

@section('content')
<form method="post" action="/UsuarioGlicoseRegistros/{{$registro->id}}">
    {{ csrf_field() }}
    @method("PATCH")
    <div class="field">
            <label class="label is-large">Data/Hora do registro</label>
            <div class="control">
            <input class="input is-large" type="text" name="created_at" placeholder="Glicose" value="{{$registro->created_at->format("d/m/Y H:i:s")}}" onKeyPress="DataHora(event, this)">
            </div>
        </div>
    <div class="field">
        <label class="label is-large">Valor da glicose</label>
        <div class="control">
        <input class="input is-large" pattern="[0-9]+([,\.][0-9]+)?" min="0" step="0.01" type="number" name="glicose" placeholder="Glicose" value="{{$registro->glicose}}">
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
<script>
        function DataHora(evento, objeto){
            var keypress=(window.event)?event.keyCode:evento.which;
            campo = eval (objeto);
            if (campo.value == '00/00/0000 00:00:00')
            {
                campo.value=""
            }
        
            caracteres = '0123456789';
            separacao1 = '/';
            separacao2 = ' ';
            separacao3 = ':';
            conjunto1 = 2;
            conjunto2 = 5;
            conjunto3 = 10;
            conjunto4 = 13;
            conjunto5 = 16;
            if ((caracteres.search(String.fromCharCode (keypress))!=-1) && campo.value.length < (19))
            {
                if (campo.value.length == conjunto1 )
                campo.value = campo.value + separacao1;
                else if (campo.value.length == conjunto2)
                campo.value = campo.value + separacao1;
                else if (campo.value.length == conjunto3)
                campo.value = campo.value + separacao2;
                else if (campo.value.length == conjunto4)
                campo.value = campo.value + separacao3;
                else if (campo.value.length == conjunto5)
                campo.value = campo.value + separacao3;
            }
            else
                event.returnValue = false;
        }
</script>
@endsection