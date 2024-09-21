@extends('ModelosLayout.site')

@section('titulo', 'Projetos')

@section('conteudo')

<x-menu-site></x-menu-site>

<div class="content p-5" id="content">

    <h1>Receitas e Despesas</h1>
    <hr>
    <x-button-back route='spaceProject.index'></x-button-back> <!-- Componente de botão para voltar -->
    <a type="button" class='btn btn-primary' href="{{route('revenuesAndExpenses.create', $spaceProjectId)}}">Cadastrar</a>
    <hr>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Tipo</th>
                <th scope="col">Valor</th>
                <th scope="col">Nome Projeto</th>
                <th scope="col">Categoria</th>
                <th scope="col">criado</th>
                <th scope="col">ultima atualização</th>
                <th colspan='2' class='text-center'>Ação</th>
              </tr>
        </thead>
        <tbody>
            {{-- {{dd($registers)}} --}}
            @if(count($registers) > 0)
                @foreach($registers as $register)
                    <tr>

                        <td scope="col">{{$register->id}}</td>
                        <td scope="col">{{$register->name}}</td>
                        <td scope="col">{{$register->description}}</td>
                        <td scope="col">{{$register->type}}</td>
                        <td scope="col">{{$register->value}}</td>
                        <td scope="col">{{$register->space_project_name}}</td>
                        <td scope="col">{{$register->category_revenues_and_expenses_name}}</td>
                        <td scope="col">{{$register->created_at}}</td>
                        <td scope="col">{{$register->updated_at}}</td>
                        <td><button class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></button></td>
                        <td><button class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button></td>


                    </tr>

                @endforeach

            @else
                <tr>
                    <td colspan='9' class='text-center'>
                        Nenhum registro encontrado
                    </td>
                    
                </tr>
            @endif
          
    
        </tbody>
</div>





@endsection