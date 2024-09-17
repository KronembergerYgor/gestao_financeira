@extends('ModelosLayout.site')

@section('titulo', 'Cadastro')

@section('conteudo')

<x-alert></x-alert>

<div class="container d-flex align-items-center justify-content-center min-vh-100">

    <div class='boxLogin border rounded shadow-lg p-5 w-75 m-5'>    
        <div class='row float-start d-flex align-items-center'> <!-- Botão de voltar a tela de login -->
            <a href="{{ route('login.index') }}" class='text-black fs-3' ><i class="bi bi-arrow-left-circle"></i></a>
        </div>
    
        <x-title-forms-users title="Cadastro" icon='<i class="bi bi-clipboard2-check"></i>'></x-title-forms-users> <!-- Componente de titulo de formulário -->
    
        <x-form-register route="RegisterUser.save" method="POST" titleButton="Cadastrar"></x-form-register>  <!-- Componente de formulário de registro -->
    
    </div>



</div>




@endsection