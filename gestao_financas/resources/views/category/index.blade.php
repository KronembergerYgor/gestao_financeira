@extends('ModelosLayout.site')

@section('titulo', 'Home')

@section('conteudo')

<x-menu-site></x-menu-site>

<div class="content" id="content">
    <x-filter-category route='category.index' />


    <div class='cardTable mx-5 px-5 py-4 bg-light rounded-2 mb-3 p-0 shadow-lg '>

    <div class='w-100 d-flex justify-content-between mb-2'>

        <x-button-back route='spaceProject.index'></x-button-back> <!-- Componente de botão para voltar -->
        <h2 class=' m-0 text-center'>Categorias</h2>
        <a type="button" class='shadow-lg btn btn-secondary btn-sm align-content-center' href="{{route('category.create')}}">Cadastrar <i class="bi bi-plus-circle-fill"></i></a>

    </div>
    
    <hr>


        <table class='table table-striped border border-secondary-subtle rounded-2 shadow my-5'>

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
                                textDescription="Deseja confirmar com a exclusão da categoria <b>{{ $category->name }}</b> e todas as <b>receitas e despesas</b> ligadas a essa categoria?"
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

</div>


@endsection