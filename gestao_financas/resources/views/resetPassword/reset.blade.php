@extends('ModelosLayout.site')

@section('titulo', 'Login')

@section('conteudo')

<x-alert></x-alert>

<div class="container">
    <h2>Redefinir Senha</h2>
    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <label for="email">Endereço de E-mail</label>
            <input type="email" class="form-control" name="email" value="{{ $email ?? old('email') }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="password">Nova Senha</label>
            <input type="password" class="form-control" name="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirme a Nova Senha</label>
            <input type="password" class="form-control" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-primary">Redefinir Senha</button>
    </form>
</div>


@endsection