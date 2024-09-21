<div class="row border rounded p-3 m-auto">
    <h4>Filtro</h4>

    <form action="{{route($route)}}" method="POST">
        @csrf

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="projectFilter" name="projectFilter" placeholder="Digite nome do projeto">
            <label for="projectFilter">Nome do Projeto</label>
        </div>    

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="descriptionFilter" name="descriptionFilter" placeholder="Digite a descrição do projeto">
            <label for="descriptionFilter">Descrição</label>
        </div>

        <input type="submit" class="btn btn-primary w-100" value="Pesquisar">

    </form>
    
</div>