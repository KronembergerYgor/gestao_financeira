@extends('ModelosLayout.site')

@section('titulo', 'Projetos')

@section('conteudo')

<x-menu-site></x-menu-site>


<div class="container d-flex align-items-center justify-content-center min-vh-100">
    
    <div class='boxLogin border rounded shadow-lg p-5 w-75 m-5'>    
        <x-button-back route='home.index'></x-button-back> <!-- Componente de botão para voltar -->
        <x-title-forms-users title="Perfil" icon='<i class="bi bi-person-badge"></i>'></x-title-forms-users> <!-- Componente de titulo de formulário -->
        
        @if(isset($user->photo))
            <img id='userPhoto' class='border rounded-circle ' src="{{ asset($user->photo)  }}" alt="Foto do Perfil">
        @else
            <i class="bi bi-person-circle" style="width: 150px; height: 150px; font-size:100px;"></i>
        @endif
        <x-form-register route="perfil.update" method="PUT" titleButton="Atualizar" :register="$user" titleButton='Atualizar'></x-form-register>
     
    </div>
</div>









@endsection
