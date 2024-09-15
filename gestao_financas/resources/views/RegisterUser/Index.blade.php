@extends('ModelosLayout.site')

@section('titulo', 'Cadastro')

@section('conteudo')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            {{-- {{dd($errors->al())}} --}}
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

<div class="container d-flex align-items-center justify-content-center min-vh-100">

    <div class='boxLogin border rounded shadow-lg p-5 w-75 m-5'>
        
        <div class='row float-start d-flex align-items-center'>
            <a href="{{ url()->previous() }}" class='text-black fs-3' ><i class="bi bi-arrow-left-circle"></i></a>
        </div>
       

        <x-title-forms-users title="Cadastro" icon='<i class="bi bi-clipboard2-check"></i>'></x-form-register>

        <hr>

        <x-form-register route="RegisterUser.save" method="POST" titleButton="Cadastrar"></x-form-register>

        <hr>
    </div>



</div>




@endsection