@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('login') }}" method="post">
            @csrf
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
                        <p class="help is-danger">{{$message}}</p>
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
                </div>
                <div class="field is-grouped is-grouped-centered">
                        <div class="control">
                            <button type="submit" class="button is-link">Fazer Login</button>
                        </div>
                    </div>
                @if (Route::has('password.request'))
                <div class="field is-grouped is-grouped-centered">
                    <div class="control">
                        <a class="is-link" href="{{ route('password.request') }}">Esqueci minha senha</a>
                    </div>
                </div>
                @endif
    </form><br>
    <div class="field is-grouped is-grouped-centered">
            <div class="control">
                <p>ou</p>
            </div>
    </div>
        <br>
    <div class="field is-grouped is-grouped-centered">
            <div class="control">
            <a href="{{route('register')}}" class="button is-primary">Registre-se</a>
            </div>
        </div>
</div>
@endsection
