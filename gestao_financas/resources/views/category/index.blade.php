@extends('ModelosLayout.site')

@section('titulo', 'Home')

@section('conteudo')

<x-menu-site></x-menu-site>

<div class="content p-5" id="content">
    <h1>Categorias</h1>
    <hr>

    {{-- <x-button-back route='spaceProject.index'></x-button-back> <!-- Componente de botão para voltar --> --}}
    <a type="button" class='btn btn-primary' href="{{route('category.create')}}">Cadastrar</a>
    <hr>


    <table class='table table-striped'>

        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Data de criação</th>
            <th>Ultima atualização</th>
            <th colspan='2'>Ação</th>
        </thead>


        <tbody>

            @if(count($categorys) > 0) 
                @foreach($categorys as $category)

                    <tr>

                        <td>{{isset($category->id) ? $category->id : "-"}}</td>
                        <td>{{isset($category->name) ? $category->name : "-"}}</td>
                        <td>{{isset($category->description) ? $category->description : "-"}}</td>
                        <td>{{isset($category->created_at) ? $category->created_at : "-"}}</td>
                        <td>{{isset($category->updated_at) ? $category->updated_at : "-"}}</td>
                        <td><button  type="button" data-bs-toggle="modal" data-bs-target="#modal_delete_category_{{$category->id}}" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i> </button></td>
                        <td><a href='{{route('category.edit', $category->id)}}' type='button' class="btn btn-success btn-sm"><i class="bi bi-pencil-square"></i></a></td>

                        <x-modal-confirmation
                            id="modal_delete_category_{{$category->id}}"
                            textDescription="Deseja confirmar com a exclusão do status {{ $category->name }}</b>?"
                            actionRoute="category.destroy"
                            method="DELETE"
                            buttonClose="Cancelar"
                            buttonAccept="Confirmar"
                            idRoute="{{ $category->id }}"
                        />

                    </tr>
            
                @endforeach



            @else

                <tr>
                    <td colspan='6'>Nenhum Registro encontrado</td>
                </tr>

            @endif

           

        </tbody>


    </table>



</div>


@endsection