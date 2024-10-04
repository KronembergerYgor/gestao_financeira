@extends('ModelosLayout.site')

@section('titulo', 'Home')

@section('conteudo')

<x-menu-site></x-menu-site>



<div class="content" id="content">
    <x-title-page title='Início' icon='<i class="bi bi-house-fill"></i>'/>


        <div class="boxFilter card text-center mb-3 d-flex flex-column p-0 shadow-lg"> 
            <div class="m-0 card-header text-start fw-bold">
                <h4 id="filterHeader" >
                    <i class="bi bi-search"></i> Filtro
                </h4>
            </div>
            <div class="cardBodyFilter card-body" id="filterBody" style="max-height: 0;">
                <div class="d-flex align-items-center" action="#" method="POST">
       
                    
                    
                    <div class="input-group w-25 me-2"> <!-- Adiciona margem à direita -->
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <select name='type' id='type' class="form-select" aria-label="Default select example">
                            <option selected disabled>selecione o Projeto</option>
                            @foreach($projects as $project)
                                <option value="{{$project->id}}">{{$project->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button id="filterButton" class="btn btn-primary btn-sm">Filtrar</button>
                
                </div>

            </div>
        </div>
    


    <div id="boxCards" class='row d-flex justify-content-around align-items-stretch mb-3'>

        <x-card-value-home-page title='Receita Geral' icon='<i class="bi bi-currency-exchange"></i>' value='{{$totals->receita_geral}}' />
        <x-card-value-home-page title='Despesas Geral' icon='<i class="bi bi-wallet2"></i>' value='{{$totals->despesa_geral}}' />
        <x-card-value-home-page title='Saldo Geral' icon='<i class="bi bi-piggy-bank-fill"></i>' value='{{$totals->saldo}}' />
       
    </div>

    <div class='row d-flex justify-content-around align-items-stretch mb-3'>

        <x-card-graphics-home-page title='Despesas e Receita' icon='<i class="bi bi-cash-coin"></i>' idGraphic='expensesAndRecives' cols='col-md-11 col-sm-12' />


    </div>

    <div class='row d-flex justify-content-around align-items-stretch mb-3'>

        <x-card-graphics-home-page title='Receita por Categoria' icon='<i class="bi bi-cash-coin"></i>' idGraphic='revenuesCategory' />
            <x-card-graphics-home-page title='Despesas por Categoria' icon='<i class="bi bi-diagram-2-fill"></i>' idGraphic='expenseCategory' />
        {{-- <x-card-graphics-home-page title='Despesas por Categoria' icon='<i class="bi bi-diagram-2-fill"></i>' idGraphic='expenseCategory' /> --}}

    </div>
</div>

@endsection
