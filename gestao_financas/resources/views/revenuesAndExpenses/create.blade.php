@extends('ModelosLayout.site')

@section('titulo', 'Projetos')

@section('conteudo')

<x-menu-site></x-menu-site>


<div class="container d-flex align-items-center justify-content-center min-vh-100">
    
    <div class='boxLogin border rounded shadow-lg p-5 w-75 m-5'>    
        <x-button-back route='revenuesAndExpenses.index' idRoute='{{$spaceProjectId}}'></x-button-back> <!-- Componente de botão para voltar -->
        <x-title-forms-users title="Cadastrar Receita/Despesa" icon='<i class="bi bi-clipboard-data"></i>'></x-title-forms-users> <!-- Componente de titulo de formulário -->

        <form method="POST" action="{{route('revenuesAndExpenses.save', $spaceProjectId)}}">
            @csrf 
            <div class="row">

                <div class="col-6">

                    <div class="input-group mb-4 mt-3">
                        <span class="input-group-text"><i class="bi bi-book"></i></span>
                        <input name="name" id="name" type="text" class="form-control" placeholder="Digite o nome" aria-label="name" aria-describedby="basic-addon1" >
                    </div>
    
                    <div class="input-group mb-4 mt-3">
                        <span class="input-group-text"><i class="bi bi-award"></i></span>
                        <select name='type' id='type' class="form-select" aria-label="Default select example">
                            <option selected>selecione o tipo</option>
                            @foreach($types as $type)
                                <option value="{{$type}}">{{$type}}</option>
                            @endforeach
                          </select>
    
                    </div>
            

                </div>

                <div class="col-6">

                    <div class="input-group mb-4 mt-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-currency-dollar"></i></span>
                        <input name="value" id="value" type="number" class="form-control" placeholder="Digite o Valor" aria-label="value" aria-describedby="basic-addon1" >
                    </div>
    
                    <div class="input-group mb-4 mt-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-bookmark"></i></span>
                        <select name='category' id='category' class="form-select" aria-label="Default select example">
                            
                            <option selected>selecione a categoria</option>
                            @foreach($categorys as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                          </select>
    
                    </div>


                </div>

                <div class="col-12">

                    <div class="input-group mb-4 mt-3">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-chat-dots"></i></span>
                        <textarea class="form-control" placeholder="Descrição do item" name="description" id="description" style="height: 100px"></textarea>
                    </div>


                </div>
         


            </div>

           

        
            <input type="submit" class='btn btn-primary' value="Cadastrar">

        </form>
        <hr>

    </div>
</div>


@endsection