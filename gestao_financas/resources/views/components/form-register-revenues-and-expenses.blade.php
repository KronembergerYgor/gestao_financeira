
<form method="POST" action="{{route($route, $spaceProjectId)}}" enctype="multipart/form-data">

    @csrf 
    @method($method)
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