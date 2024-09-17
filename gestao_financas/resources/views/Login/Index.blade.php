@extends('ModelosLayout.site')

@section('titulo', 'Login')

@section('conteudo')

<x-alert></x-alert>

<div class="container d-flex align-items-center justify-content-center min-vh-100">

    <div class='boxLogin border rounded shadow-lg p-5 w-50 m-5'>
        <x-title-forms-users title=" Bem Vindo" icon='<i class="bi bi-diagram-2"></i>'></x-form-register>
        <hr>
        @if(!auth()->check())

            <form action="{{route('login.enter')}}" method="POST">
                @csrf <!-- Token CSRF para proteger contra ataques CSRF -->
                <div class="input-group mb-4 mt-3">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                    <input name='email' id='email' type="email" class="form-control" placeholder="Digite seu e-mail" aria-label="email" aria-describedby="basic-addon1">
                </div>

                <div class="input-group mb-2">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                    <input name='password' id='password' type="password" class="form-control" placeholder="Digite sua senha" aria-label="password" aria-describedby="basic-addon1">
                </div>

                
                    <button type="submit" class="btn btn-primary mt-3 w-100">Entrar</button>

            </form>

            <hr>

     
            <div class='boxPassword row'>
                <div class="rememberPassword col d-flex justify-content-center">
                    <a href="#">Esqueceu a senha?</a> 
                </div>
                <div class='col'>
                    <a type="button" class="btn btn-secondary" href='{{route('RegisterUser.index')}}'>Cadastre-se</a>
                </div>
            </div>
        
        @else
            <div class='welcomeText'>
                <h4>Olá, {{ auth()->user()->name }}!</h4>
                <p>Estamos felizes em tê-lo aqui.</p>
                <p>Explore as funcionalidades e aproveite ao máximo sua experiência.</p>
                <p>Tenha um ótimo dia!</p>
            </div>
                <hr>


                <a type="button" class="btn btn-primary" href='{{route('home.index')}}'>Acessar</a>
           
         
        @endif

      
    </div>

</div>

@endsection
