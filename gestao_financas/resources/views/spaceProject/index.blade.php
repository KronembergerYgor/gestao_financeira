@extends('ModelosLayout.site')

@section('titulo', 'Projetos')

@section('conteudo')

<x-menu-site></x-menu-site>

<div class="content" id="content">

    <h1>Projetos</h1>
    <hr>

    <x-filter-space-projects route="spaceProject.index" />
 

    <a type="button" class="btn btn-primary mb-4 mt-4" href='{{ route('spaceProject.registerProject') }}'>Criar espaço de projeto</a>

    <div class="row border rounded p-5 m-auto">
        @if(count($projects) > 0)
            <div class="row g-3">
                @foreach($projects as $project)

                    <div class="card col-md-5 m-auto p-0 mb-3">
                        <div class="card-header text-center">
                            <h3>{{ $project->name }}</h3>
                        </div>
                        <div class="card-body p-0">
                            @if(!empty($project->description))

                                @if(strlen($project->description) > 40)
                                    <p class="card-text p-3 mb-0 text-center">
                                        {{ Str::limit($project->description, 40) }}
                                        <a class='cursor-pointer' style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#modal_item_{{$project->id}}">
                                            Ver mais
                                        </a> 
                                    </p>

                                    <x-modal-description descriptionTitle='Descrição' :registro="$project" />

                                @else
                                    <p class="card-text p-3 mb-0 text-center">{{ $project->description }}</p>
                                @endif

                            @else
                                <p class="card-text p-3 mb-0 text-center">Nenhuma descrição cadastrada</p>
                            @endif

                            <div class="card-footer text-body-secondary d-flex justify-content-between">
                                <a href="#" class="btn btn-primary">Acessar Projeto</a>
                                <div>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal_delete_register_project_{{$project->id}}">
                                        <i class="bi bi-trash"></i>
                                    </button>

                                    <x-modal-confirmation
                                        id="modal_delete_register_project_{{$project->id}}"
                                        textDescription="Deseja confirmar com a exclusão do projeto <b>{{ $project->name }}</b>?"
                                        actionRoute="spaceProject.registerProject.destroy"
                                        method="POST"
                                        buttonClose="Cancelar"
                                        buttonAccept="Confirmar"
                                        idRoute="{{ $project->id }}"
                                    />

                                    <a href="{{ route('spaceProject.registerProject.edit', $project->id) }}" type="button" class="btn btn-success">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>

            {{ $projects->links('pagination::bootstrap-4') }}

        @else
            <span>Nenhum projeto cadastrado</span>
        @endif
    </div>

</div>
@endsection
