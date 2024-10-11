@extends('ModelosLayout.site')

@section('titulo', 'Login')

@section('conteudo')

<x-alert></x-alert>     

<div class="container d-flex align-items-center justify-content-center min-vh-100">
    

    <div class='boxLogin border rounded shadow-lg p-5 w-50 m-5'>
        <x-button-back route='login.index'></x-button-back> <!-- Componente de botão para voltar -->
        <x-title-forms-users title="Recuperação de Senha" icon='<i class="bi bi-diagram-2"></i>'></x-title-forms-users> <!-- Componente de titulo de formulário -->
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="form-group mb-3">
                <label class='m-3' for="email">Endereço de E-mail</label>
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <button type="submit" class="btn btn-primary">Enviar link de recuperação</button>

            @if (session('status'))
                <div class="alert alert-success mt-3">
                    {{ session('status') }}
                </div>
            @endif
        </form>

    </div>

</div>

@endsection