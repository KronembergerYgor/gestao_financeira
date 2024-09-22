<div class="row border rounded p-3 m-auto">
    <h4>Filtro</h4>

    <form action="{{route($route , $idRoute)}}" method="POST">
        @csrf

        <div class="row">
            <div class="col-4 form-floating mb-3">
                <input type="number" class="form-control" id="idItemFilter" name="idItemFilter" placeholder="Digite ID do item">
                <label for="idItemFilter">Id do item</label>
            </div>  
            
            <div class="col-4 form-floating mb-3">
                <input type="text" class="form-control" id="nameFilter" name="nameFilter" placeholder="Digite o nome do item">
                <label for="nameFilter">Nome do item</label>
            </div>

            <div class="col-4 form-floating mb-3">
                <input type="text" class="form-control" id="descriptionFilter" name="descriptionFilter" placeholder="Digite o valor do item">
                <label for="descriptionFilter">Descrição Item</label>
            </div>

    

        </div>



        <div class='row'>

            <div class='col-4'>

                <div class="input-group mb-4 mt-3">

                    <select name='typeFilter' id='typeFilter' class="form-select" aria-label="tipo de item">
                        <option selected disabled>selecione o tipo</option>
                        @foreach($types as $type)
                            <option value="{{$type}}">{{$type}}</option>
                        @endforeach
                    </select>
    
                </div>

            </div>


            <div class="col-4">
                <div class="input-group mb-4 mt-3">
                    <select name='categoryFilter' id='categoryFilter' class="form-select" aria-label="categoria">
                        <option selected disabled>selecione a categoria</option>

                        @foreach($categorys as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
    
            
                    </select>
                </div>


            </div>

            <div class="col-4 form-floating mb-3">
                <input type="number" class="form-control" id="valueFilter" name="valueFilter" placeholder="Digite o valor do item">
                <label for="valueFilter">Valor do item</label>
            </div>
           



            


        </div>



       
        <input type="submit" class="btn btn-primary w-100" value="Pesquisar">

    </form>
    
</div>