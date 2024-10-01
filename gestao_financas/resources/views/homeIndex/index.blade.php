@extends('ModelosLayout.site')

@section('titulo', 'Home')

@section('conteudo')

<x-menu-site></x-menu-site>



<div class="content" id="content">

<x-title-page title='Início' icon='<i class="bi bi-house-fill"></i>'/>


    <div id="boxCards" class='row d-flex justify-content-around align-items-stretch mb-3'>

        <!-- Card 1 -->
        <div class="cardContentText card col-md-4 col-sm-12 mb-3 shadow-lg p-0">
            <div class="card-header fw-bold">
                <h5><i class="bi bi-currency-exchange"></i> Receita Geral</h5>
            </div>
            <div class="card-body text-center">
                <h3>R$ {{$totals->receita_geral}}</h3> 
            </div>
        </div>

        <!-- Card 2 -->
        <div class="cardContentText card col-md-4 col-sm-12 mb-3 shadow-lg p-0">
          <div class="card-header fw-bold">
            <h5><i class="bi bi-wallet2"></i> Despesas Geral</h5>
        </div>
            <div class="card-body text-center">
              <h3>R$ {{$totals->despesa_geral}}</h3>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="cardContentText card col-md-4 col-sm-12 mb-3 shadow-lg p-0">
          <div class="card-header fw-bold">
            <h5><i class="bi bi-piggy-bank-fill"></i> Saldo Geral</h5>
        </div>
            <div class="card-body text-center">
              <h3>R$ {{$totals->saldo}}</h3>
            </div>
        </div>

    </div>

    <div class='row d-flex justify-content-around align-items-stretch mb-3'>

        <div class="card col-md-5 col-sm-12 text-center mb-3 d-flex flex-column p-0 shadow-lg"> 
            <div class="m-0 card-header text-start fw-bold">
                <i class="bi bi-cash-coin"></i> Despesas e Receita
            </div>
            <div class="card-body d-flex align-items-center justify-content-center">
                <canvas id="expensesAndRecives" style="max-height: 300px; width: 100%;"></canvas>
            </div>
            <div class="card-footer text-body-secondary">
                Atualizado recentemente
            </div>
        </div>

        <div class="card col-md-5 col-sm-12 text-center mb-3 d-flex flex-column p-0 shadow-lg"> 
            <div class="card-header text-start fw-bold">
                <i class="bi bi-diagram-2-fill"></i> Despesas por Categoria
            </div>
            <div class="card-body d-flex align-items-center justify-content-center">
                <canvas id="expenseCategory" style="max-height: 300px; width: 100%;"></canvas>
            </div>
            <div class="card-footer text-body-secondary">
                Atualizado recentemente
            </div>
        </div>

    </div>
</div>

@endsection
