@extends('ModelosLayout.site')

@section('titulo', 'Home')

@section('conteudo')
<x-menu-site></x-menu-site>

<div class="content" id="content">
    <x-filter-home-page :registers="$projects"/>

    <div id="boxCards" class='row d-flex justify-content-around align-items-stretch mb-3'>
        <x-card-value-home-page title='Receita Geral' icon='<i class="bi bi-currency-exchange"></i>' />
        <x-card-value-home-page title='Despesas Geral' icon='<i class="bi bi-wallet2"></i>' />
        <x-card-value-home-page title='Saldo Geral' icon='<i class="bi bi-piggy-bank-fill"></i>' />
    </div>

    <div class='row d-flex justify-content-around align-items-stretch mb-3'>
        <x-card-graphics-home-page title='Despesas e Receita' icon='<i class="bi bi-cash-coin"></i>' idGraphic='expensesAndRecives' cols='col-md-11 col-sm-12' />
    </div>

    <div class='row d-flex justify-content-around align-items-stretch mb-3'>
        <x-card-graphics-home-page title='Receita por Categoria' icon='<i class="bi bi-cash-coin"></i>' idGraphic='revenuesCategory' />
        <x-card-graphics-home-page title='Despesas por Categoria' icon='<i class="bi bi-diagram-2-fill"></i>' idGraphic='expenseCategory' />
    </div>
</div>
@endsection
