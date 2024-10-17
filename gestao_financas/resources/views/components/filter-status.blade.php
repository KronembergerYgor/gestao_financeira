<div class="row border rounded p-3 mt-3 m-auto">
    <h4>Filtro</h4>

    <form action="{{route($route)}}" method="POST">
        @csrf


        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="idStatusFilter" name="idStatusFilter" placeholder="Digite o ID do Status">
            <label for="idStatusFilter">ID do Status</label>
        </div>    

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nameStatusFilter" name="nameStatusFilter" placeholder="Digite nome do Status">
            <label for="nameStatusFilter">Nome do Status</label>
        </div>    

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="descriptionStatusFilter" name="descriptionStatusFilter" placeholder="Digite a descrição do Status">
            <label for="descriptionStatusFilter">Descrição</label>
        </div>

        <input type="submit" class="btn btn-primary w-100" value="Pesquisar">

    </form>
    
</div>