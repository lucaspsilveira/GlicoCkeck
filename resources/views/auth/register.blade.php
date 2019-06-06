@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('register') }}" method="post">
        @csrf
        <div class="field">
            <label class="label">Nome</label>
            <div class="control">
            <input class="input @error('name') is-danger @enderror" type="text" name="name" placeholder="Nome completo" value="{{ old('name') }}" required>
            </div>
        </div>
        
        <div class="field">
            <label class="label">Usuário</label>
            <div class="control has-icons-left has-icons-right">
            <input class="input @error('usuario') is-danger @enderror" type="text" placeholder="Seu usuário aqui" name="usuario" value="{{ old('usuario') }}" required>
            <span class="icon is-small is-left">
                <i class="fas fa-user"></i>
            </span>
            {{-- <span class="icon is-small is-right">
                <i class="fas fa-check"></i>
            </span> --}}
            </div>
            @error('usuario')  
            <p class="help is-danger">Já existe este nome de usuário.</p>
            @enderror
        </div>

        <div class="field">
                <label class="label">Sexo</label>
                <div class="control">
                <label class="radio">
                    <input type="radio" name="sexo" value="0" required>
                    Masculino
                </label>
                <label class="radio">
                    <input type="radio" name="sexo" value="1" required>
                    Feminino
                </label>
                <label class="radio" style="margin-left: auto;">
                    <input type="radio" name="sexo" value="2" required>
                        Não quero declarar
                </label>
                </div>
            </div>

            <div class="field">
                    <label class="label">Data de nascimento</label>
                    <div class="control has-icons-left has-icons-right">
                    <input class="input @error('data_nascimento') is-danger @enderror" type="date" placeholder="dd/mm/aaaa" name="data_nascimento" value="{{ old('data_nascimento') }}" required>
                    <span class="icon is-small is-left">
                        <i class="fas fa-calendar"></i>
                    </span>
                    {{-- <span class="icon is-small is-right">
                        <i class="fas fa-check"></i>
                    </span> --}}
                    </div>
                    {{-- <p class="help is-success">This username is available</p> --}}
                </div>
        
        <div class="field">
            <label class="label">Email</label>
            <div class="control has-icons-left has-icons-right">
            <input class="input @error('email') is-danger @enderror" type="email" placeholder="exemplo@mail.com" name="email" value="{{ old('email') }}" required>
            <span class="icon is-small is-left">
                <i class="fas fa-envelope"></i>
            </span>
            
            </div>
            @error('email')  
                <span class="icon is-small is-right">
                    <i class="fas fa-exclamation-triangle"></i>
                </span>
                <p class="help is-danger">Esse e-mail é invalido</p>
            @enderror
        </div>

        <div class="field">
            <label for="password" class="label">Senha</label>
            <p class="control has-icons-left">
                <input class="input @error('password') is-danger @enderror" type="password" placeholder="Senha" name="password" required>
                <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
                </span>
            </p>
            <label for="password" class="label">Confirmação de senha</label>
            <p class="control has-icons-left">
                <input class="input @error('password') is-danger @enderror" type="password" placeholder="Senha" name="password_confirmation" required>
                <span class="icon is-small is-left">
                <i class="fas fa-lock"></i>
                </span>
            </p>
            @error('password')  
                <span class="icon is-small is-right">
                    <i class="fas fa-exclamation-triangle"></i>
                </span>
                <p class="help is-danger">{{ $message }}</p>
            @enderror
            </div>
        
        {{-- <div class="field">
            <label class="label">Subject</label>
            <div class="control">
            <div class="select">
                <select>
                <option>Select dropdown</option>
                <option>With options</option>
                </select>
            </div>
            </div>
        </div> --}}
        
        {{-- <div class="field">
            <label class="label">Message</label>
            <div class="control">
            <textarea class="textarea" placeholder="Textarea"></textarea>
            </div>
        </div> --}}

        
        
        {{-- <div class="field">
            <div class="control">
            <label class="checkbox">
                <input type="checkbox">
                I agree to the <a href="#">terms and conditions</a>
            </label>
            </div>
        </div> --}}
        
        
        
        <div class="field is-grouped is-grouped-centered">
            <div class="control">
                <button type="submit" class="button is-link">Cadastrar</button>
            </div>
            <div class="control">
                <button class="button is-text">Cancelar</button>
            </div>
        </div>
    </form>
</div>
@endsection
