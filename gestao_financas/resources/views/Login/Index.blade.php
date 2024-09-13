@extends('ModelosLayout.site')

@section('titulo', 'Login')

@section('conteudo')

<div class="container d-flex align-items-center justify-content-center min-vh-100">

    <div class='boxLogin border rounded shadow-lg p-5 w-50'>
        <div class='title text-center mb-3'>
            <h1><i class="bi bi-diagram-2"></i> Bem Vindo</h1>
        </div>
        <hr>

        <form action="/#" method="POST">
            <div class="input-group mb-4 mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                <input type="email" class="form-control" placeholder="Digite seu e-mail" aria-label="email" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-2">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                <input type="password" class="form-control" placeholder="Digite sua senha" aria-label="password" aria-describedby="basic-addon1">
            </div>

            <button type="submit" class="btn btn-primary mt-3 w-100">Entrar</button>
        </form>

        <hr>

        <div class='boxPassword row'>
            <div class="rememberPassword col d-flex justify-content-center">
                <p class=''>Esqueceu a senha? <a href="#"> Clique aqui</a> </p>
            </div>
            <div class='col'>
                <button type="button" class="btn btn-secondary">Cadastre-se</button>
            </div>
        </div>
    </div>

</div>

@endsection
