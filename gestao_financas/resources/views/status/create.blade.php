@extends('ModelosLayout.site')

@section('titulo', 'Projetos')

@section('conteudo')

<x-menu-site></x-menu-site>

<div class="container d-flex align-items-center justify-content-center min-vh-100">
    
    <div class='boxLogin border rounded shadow-lg p-5 w-75 m-5'>    
        <x-button-back route='status.index'></x-button-back> <!-- Componente de botão para voltar -->
        <x-title-forms-users title="Cadastrar Status" icon='<i class="bi bi-clipboard-data"></i>'></x-title-forms-users> <!-- Componente de titulo de formulário -->
        <x-form-register-status route='status.save' method="POST"/>
     



    </div>
</div>





@endsection