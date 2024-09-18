<form action="{{route($route)}}" method='{{$method}}' enctype="multipart/form-data">

    @csrf <!-- Token CSRF para proteger contra ataques CSRF -->

    <div class="input-group mb-4 mt-3">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-clipboard-fill"></i></span>
        <input name="nameProject" id="nameProject" type="text" class="form-control" placeholder="Digite o nome do projeto" aria-label="Name" aria-describedby="basic-addon1">
    </div>

    <div class="input-group mb-4 mt-3">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-chat-dots"></i></span>
        <textarea class="form-control" placeholder="Descrição do projeto" name="descriptionProject" id="descriptionProject" style="height: 100px"></textarea>
    </div>

    <div>
        <input type="submit" class="btn btn-primary w-100" value="Cadastrar">
    </div>

</form>

<hr> 


