@extends('ModelosLayout.site')

@section('titulo', 'Cadastro')

@section('conteudo')

<x-alert></x-alert>

<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <x-alert></x-alert>

    <div class='boxLogin border rounded shadow-lg p-5 w-75 m-5'>    

        <x-button-back route='login.index'></x-button-back> <!-- Componente de botão para voltar -->
   
        <x-title-forms-users title="Cadastro" icon='<i class="bi bi-clipboard2-check"></i>'></x-title-forms-users> <!-- Componente de titulo de formulário -->
    
        <x-form-register route="RegisterUser.save" method="POST" titleButton="Cadastrar"></x-form-register>  <!-- Componente de formulário de registro -->
    
    </div>



</div>




@endsection