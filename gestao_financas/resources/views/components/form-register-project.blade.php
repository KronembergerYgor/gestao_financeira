<form action="{{ isset($registro) ? route($route, $registro->id) : route($route) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class='contentForm'>

        <div class="input-group mb-4 mt-3">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-clipboard-fill"></i></span>
            <input name="nameProject" id="nameProject" type="text" class="form-control" placeholder="Digite o nome do projeto" aria-label="Name" aria-describedby="basic-addon1" 
            value="{{ old('nameProject', isset($registro) ? $registro->name : '') }}">
        </div>
    
        <div class="input-group mt-3">
            <span class="input-group-text" id="basic-addon1"><i class="bi bi-chat-dots"></i></span>
            <textarea class="form-control" placeholder="Descrição do projeto" name="descriptionProject" id="descriptionProject" style="height: 100px">{{ old('descriptionProject', isset($registro) ? $registro->description : '') }}</textarea>
        </div>
        

    </div>

    <hr>
    <div class='d-flex justify-content-center'>
        <input type="submit" class="btn btn-primary" value="{{ $nameButton }}">
        <button type="button" class="btn btn-outline-danger ms-2" onclick="history.back()">Cancelar</button>
    </div>


</form>
