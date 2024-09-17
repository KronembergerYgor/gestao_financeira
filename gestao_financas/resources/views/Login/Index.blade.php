@extends('ModelosLayout.site')

@section('titulo', 'Login')

@section('conteudo')

<x-alert></x-alert>

<div class="container d-flex align-items-center justify-content-center min-vh-100">

    <div class='boxLogin border rounded shadow-lg p-5 w-50 m-5'>
        <x-title-forms-users title=" Bem Vindo" icon='<i class="bi bi-diagram-2"></i>'></x-title-forms-users> <!-- Componente de titulo de formulário -->
        @include('Login.formLogin') <!-- formulário de login -->
    </div>

</div>

@endsection
