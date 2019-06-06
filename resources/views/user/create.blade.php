@extends('layout')

@section('content')
<form method="post" action="/users">
    {{ csrf_field() }}
    <div class="field">
        <label class="label is-large">Nome</label>
        <div class="control">
            <input class="input is-large" type="text" name="name" placeholder="nome">
        </div>
    </div>
    <div class="field">
        <label class="label is-large">Usuário</label>
        <div class="control">
            <input class="input is-large" type="text" name="usuario" placeholder="usuário">
        </div>
    </div>
    <div class="field">
        <label class="label is-large">Data de Nascimento</label>
        <div class="control">
            <input class="input is-large" type="text" name="data_nascimento" placeholder="aaaa-mm-dd">
        </div>
    </div>
    <div class="field">
        <label class="label is-large">Email</label>
        <div class="control">
            <input class="input is-large" type="email" name="email" placeholder="email@email.com">
        </div>
    </div>
    <div class="field">
        <label class="label is-large">Senha</label>
        <div class="control">
            <input class="input is-large" type="password" name="password" placeholder="senha">
        </div>
    </div>
    <div class="field">
        <div class="control">
            <button class="button is-primary">
            Cadastrar-se
            </button>
        </div>
        </div>
</form>
@endsection