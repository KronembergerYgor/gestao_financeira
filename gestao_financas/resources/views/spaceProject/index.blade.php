@extends('ModelosLayout.site')

@section('titulo', 'Projetos')

@section('conteudo')

<x-menu-site></x-menu-site>

<div class="content" id="content">

    <x-filter-space-projects route="spaceProject.index" />

    <div id="projectCarousel" class="carousel slide m-2 rounded-3" data-bs-ride="carousel">

        <div class='mx-auto w-75 d-flex justify-content-end'>
            <a type="button" class="shadow-lg btn btn-secondary mb-4 mt-4 me-3 btn-lg" href='{{ route('spaceProject.registerProject') }}'>Criar Projeto <i class="bi bi-plus-circle-fill"></i></a>
        </div>

        <div class="d-flex justify-content-around">

            <div class="carousel-inner text-center w-75">
                @if(count($projects) > 0)
                    @foreach($projects as $index => $project)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="cardProject card m-3 border-0" >
                                <div class="card-header text-center bg-light" style="border-top-left-radius: 15px; border-top-right-radius: 15px;">
                                    <h1 class='fw-bold fs-1'>{{ $project->name }}</h1>
                                </div>
                                <div class="card-body p-4">

                                    <div class='row'>
                                        <div class='boxTextResumeProject col text-start bgc-description-project'>
                                            @if(!empty($project->description))
                                                <a class='fw-bold fs-4 d-flex align-items-center text-decoration-none text-dark card-text py-2 ps-1' style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#modal_item_{{$project->id}}">
                                                    Abrir Descrição<i class="bi bi-plus"></i>
                                                </a>
                                                <x-modal-description descriptionTitle='Descrição' :registro="$project" />

                                            @else
                                                <p class="fw-bold card-text py-2 ps-1 fs-4">Nenhuma descrição cadastrada</p>
                                            @endif

                                        </div>

                                        <div class='boxTextResumeProject col fw-bold bgc-revenue'>
                                            <p class='card-text text-start py-2 ps-1 fs-4'>
                                                <i class=" bi bi-plus-circle"></i> 
                                                Total de Receita: R$ {{ $project->receita_geral }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class='row mt-3'>
                                        <div class='boxTextResumeProject col fw-bold bgc-description-project'>
                                            <p class='card-text text-start py-2 ps-1 fs-4'>Total do saldo R$ {{ $project->saldo }}</p>
                                        </div>
                                        <div class='boxTextResumeProject col fw-bold bgc-expense'>
                                            <p class='card-text text-start py-2 ps-1 fs-4'>
                                                <i class="bi bi-dash-circle"></i> 
                                                Total da Despesa R$ {{ $project->despesa_geral }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class='row my-4'>
                                        <div class='boxTextResumeProject w-75 m-auto fw-bold mt-3 d-flex justify-content-center p-3'>
                                                @if($project->receita_geral == 0 && $project->despesa_geral == 0)
                                                    <p class='card-text text-start p-0 m-0 fs-3 text-center'>
                                                        <i class="text-secondary bi bi-0-circle"></i> Sem Saldo
                                                    </p>
                                                @else
                                                    @if($project->porcentagem <= 0)
                                                        <p class='card-text text-start p-0 m-0 fs-3 text-center'>
                                                            <i class="text-danger bi bi-x-circle"></i> Saldo Negativo
                                                        </p>
                                                    @elseif($project->porcentagem <= 20 && $project->porcentagem > 0)
                                                        <p class='card-text text-start p-0 m-0 fs-3 text-center'>
                                                            <i class="text-warning bi bi-exclamation-circle"></i> Atenção! Verifique seus gastos
                                                        </p>
                                                    @else
                                                        <p class='card-text text-start p-0 m-0 fs-3 text-center w-100 h-100'>
                                                            <i class="text-success bi bi-check-circle"></i> Orçamento em dia
                                                        </p>
                                                    @endif
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="p-4 card-footer text-body-secondary d-flex justify-content-between bg-light" style="border-bottom-left-radius: 15px; border-bottom-right-radius: 15px;">
                                    <div class='d-flex justify-content-start mx-5'>
                                        <a href="{{ route('revenuesAndExpenses.index', $project->id) }}" class="btn btn-primary btn-lg">Acessar Projeto</a>
                                    </div>
                                    <div class='d-flex justify-content-end mx-5'>
                                        <button type="button" class="btn btn-danger btn-lg me-1" data-bs-toggle="modal" data-bs-target="#modal_delete_register_project_{{$project->id}}">
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
    
                                        <a href="{{ route('spaceProject.registerProject.edit', $project->id) }}" type="button" class="btn btn-success btn-lg">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- {{ $projects->links('pagination::bootstrap-4') }} --}}
                @else
                    <span>Nenhum projeto cadastrado</span>
                @endif
            </div>
       
        </div>


        <button class="carousel-control-prev" type="button" data-bs-target="#projectCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#projectCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>

</div>



@endsection
