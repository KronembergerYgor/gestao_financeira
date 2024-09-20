<form action="{{ isset($registro) ? route($route, $registro->id) : route($route) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class="input-group mb-4 mt-3">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-clipboard-fill"></i></span>
        <input name="nameProject" id="nameProject" type="text" class="form-control" placeholder="Digite o nome do projeto" aria-label="Name" aria-describedby="basic-addon1" 
        value="{{ old('nameProject', isset($registro) ? $registro->name : '') }}">
    </div>

    <div class="input-group mb-4 mt-3">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-chat-dots"></i></span>
        <textarea class="form-control" placeholder="Descrição do projeto" name="descriptionProject" id="descriptionProject" style="height: 100px">{{ old('descriptionProject', isset($registro) ? $registro->description : '') }}</textarea>
    </div>

    <div>
        <input type="submit" class="btn btn-primary w-100" value="{{ $nameButton }}">
    </div>
</form>

<hr>
