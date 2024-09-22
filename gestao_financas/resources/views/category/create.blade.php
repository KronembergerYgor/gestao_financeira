@extends('ModelosLayout.site')

@section('titulo', 'Home')

@section('conteudo')

<x-menu-site></x-menu-site>


<div class="container d-flex align-items-center justify-content-center min-vh-100">
    
    <div class='boxLogin border rounded shadow-lg p-5 w-75 m-5'>    
        <x-button-back route='category.index'></x-button-back> <!-- Componente de botão para voltar -->
        <x-title-forms-users title="Cadastrar Categoria" icon='<i class="bi bi-clipboard-data"></i>'></x-title-forms-users> <!-- Componente de titulo de formulário -->
        <x-form-register-category route="category.save" method="POST"></x-form-register-category>
    </div>
</div>




@endsection