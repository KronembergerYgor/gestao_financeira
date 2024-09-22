<form action="{{isset($registro) ? route($route, $registro->id) : route($route) }}" method="POST">
    @csrf
    @method($method)

    <div class="input-group mb-4 mt-3">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-clipboard-fill"></i></span>
        <input name="nameCategory" id="nameCategory" type="text" class="form-control" placeholder="Digite o nome da categoria" aria-label="Name" aria-describedby="basic-addon1" 
        value="{{ old('nameCategory', isset($registro) ? $registro->name : '') }}">
    </div>

        
    <div class="input-group mb-4 mt-3">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-chat-dots"></i></span>
        <textarea class="form-control" placeholder="Descrição da categoria" name="descriptionCategory" id="descriptionCategory" style="height: 100px">{{ old('descriptionCategory', isset($registro) ? $registro->description : '') }}</textarea>
    </div>

    <input type="submit" class='btn btn-primary' value="Cadastrar">

</form>