@extends('ModelosLayout.site')

@section('titulo', 'Projetos')

@section('conteudo')

<x-menu-site></x-menu-site>


<div class="container d-flex align-items-center justify-content-center min-vh-100">

    <x-alert></x-alert>
    <div class='boxLogin border rounded shadow-lg p-5 w-75 m-5'>    
        <x-button-back route='revenuesAndExpenses.index' idRoute='{{$register->space_project_id}}'></x-button-back> <!-- Componente de botão para voltar -->
        <x-title-forms-users title="Editar Receita/Despesa" icon='<i class="bi bi-clipboard-data"></i>'></x-title-forms-users> <!-- Componente de titulo de formulário -->
        <x-form-register-revenues-and-expenses titleButton='Atualizar' route="revenuesAndExpenses.update" method='PUT' :register="$register" spaceProjectId="{{$register->space_project_id}}" :categorys="$categorys" :types="$types" /> 

    </div>
</div>


@endsection