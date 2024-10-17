@extends('ModelosLayout.site')

@section('titulo', 'Projetos')

@section('conteudo')

<x-menu-site></x-menu-site>

<div class="content" id="content">
    <x-alert></x-alert>

    <x-filter-revenues-and-expenses route="revenuesAndExpenses.index" idRoute={{$spaceProjectId}} :types="$types" :categorys="$categorys"/>

    <div class='cardTable mx-5 px-5 py-4 bg-light rounded-2 mb-3 p-0 shadow-lg '>

        <div class='w-100 d-flex justify-content-between mb-2'>

            <x-button-back route='spaceProject.index'></x-button-back> <!-- Componente de botão para voltar -->
            <h2 class=' m-0 text-center'>Receitas e Despesas</h2>
            <a type="button" class='shadow-lg btn btn-secondary btn-sm align-content-center' href="{{route('revenuesAndExpenses.create', $spaceProjectId)}}">Cadastrar <i class="bi bi-plus-circle-fill"></i></a>

        </div>

        <hr>
       

        
        <table class="table table-striped border border-secondary-subtle rounded-2 shadow my-5">
           
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

                @if(count($registers) > 0)
                    @foreach($registers as $register)
                        <tr>

                            <td scope="col">{{$register->id}}</td>
                            <td scope="col">{{$register->name}}</td>
                            <td scope="col">{{Str::limit($register->description, 20)}}</td>
                            <td scope="col">{{$register->type}}</td>
                            <td scope="col">R$ {{$register->value}}</td>
                            <td scope="col">{{$register->space_project_name}}</td>
                            <td scope="col">{{$register->category_revenues_and_expenses_name}}</td>
                            <td scope="col">{{$register->created_at}}</td>
                            <td scope="col">{{$register->updated_at}}</td>
                            <td><button  type="button" data-bs-toggle="modal" data-bs-target="#modal_delete_register_{{$register->id}}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> </button></td>
                            <td><a href='{{route('revenuesAndExpenses.edit', $register->id )}}' type='button' class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a></td>


                            <x-modal-confirmation
                                id="modal_delete_register_{{$register->id}}"
                                textDescription="Deseja confirmar com a exclusão da <b>{{ $register->type }}</b> com nome <b>{{ $register->name }}</b>?"
                                actionRoute="revenuesAndExpenses.destroy"
                                method="DELETE"
                                buttonClose="Cancelar"
                                buttonAccept="Confirmar"
                                idRoute="{{ $register->id }}"
                            />

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
       

        </table>
        {{ $registers->links('pagination::bootstrap-4') }}
    </div>    
</div>





@endsection