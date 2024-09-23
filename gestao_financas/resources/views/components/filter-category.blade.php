<div class="row border rounded p-3 m-auto">
    <h4>Filtro</h4>

    <form action="{{route($route)}}" method="POST">
        @csrf


        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="idCategoryFilter" name="idCategoryFilter" placeholder="Digite o ID da categoria">
            <label for="idCategoryFilter">ID do Projeto</label>
        </div>    

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nameCategoryFilter" name="nameCategoryFilter" placeholder="Digite nome da categoria">
            <label for="nameCategoryFilter">Nome do Projeto</label>
        </div>    

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="descriptionCategoryFilter" name="descriptionCategoryFilter" placeholder="Digite a descrição da categoria">
            <label for="descriptionCategoryFilter">Descrição</label>
        </div>

        <input type="submit" class="btn btn-primary w-100" value="Pesquisar">

    </form>
    
</div>