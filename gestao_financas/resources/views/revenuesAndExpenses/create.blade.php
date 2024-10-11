@extends('ModelosLayout.site')

@section('titulo', 'Projetos')

@section('conteudo')

<x-menu-site></x-menu-site>


<div class="container d-flex align-items-center justify-content-center min-vh-100">
    
    <div class='boxLogin border rounded shadow-lg p-5 w-75 m-5'>    
        <x-button-back route='revenuesAndExpenses.index' idRoute='{{$spaceProjectId}}'></x-button-back> <!-- Componente de botão para voltar -->
        <x-title-forms-users title="Cadastrar Receita/Despesa" icon='<i class="bi bi-clipboard-data"></i>'></x-title-forms-users> <!-- Componente de titulo de formulário -->
        <x-form-register-revenues-and-expenses route="revenuesAndExpenses.save" method='POST' spaceProjectId="{{$spaceProjectId}}" :categorys="$categorys" :types="$types" /> 
    </div>
</div>


@endsection