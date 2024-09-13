@extends('ModelosLayout.site')

@section('titulo', 'Cadastro')

@section('conteudo')

<div class="container d-flex align-items-center justify-content-center min-vh-100">

    <div class='boxLogin border rounded shadow-lg p-5 w-75 m-5'>

        <x-title-forms-users title="Cadastro" icon='<i class="bi bi-clipboard2-check"></i>'></x-form-register>

        <hr>

        <x-form-register route="login.index" method="POST" titleButton="Cadastrar"></x-form-register>

        <hr>
    </div>



</div>




@endsection