
<div class="boxFilter card text-center mb-3 d-flex flex-column p-0 shadow-lg"> 

    <form action="#" method="POST">
        @csrf

        <div class="m-0 card-header text-start fw-bold">
            <h4 id="filterHeader"><i class="bi bi-search"></i> Filtro</h4>
        </div>

        <div class="cardBodyFilter card-body" id="filterBody" style="max-height: 0;">
            <div class="d-flex w-100">

                    <div class="input-group me-2">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-gear-wide"></i></span>
                        <input type="number" class="form-control" id="idItemFilter" name="idItemFilter" placeholder="Digite ID do item">
                    </div>
    
                    <div class="input-group me-2">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-bar-chart-line-fill"></i></span>
                        <input type="text" class="form-control" id="nameFilter" name="nameFilter" placeholder="Digite o nome do item">
    
                    </div>
    
                    <div class="input-group me-2">
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-chat-left-dots"></i></span>
                        <input type="text" class="form-control" id="descriptionFilter" name="descriptionFilter" placeholder="Digite a descrição do item">
    
                    </div>
    
              
    
        
            </div>

            <div class='w-100 d-flex justify-content-start mt-4'>

                
                <div class="input-group  me-2">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-bookmark-fill"></i></span>
                    <select name='categoryFilter' id='categoryFilter' class="form-select" aria-label="categoria">
                        <option selected disabled>selecione a categoria</option>
                        @foreach($categorys as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group me-2">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-currency-dollar"></i></span>
                    <input type="number" class="form-control" id="valueFilter" name="valueFilter" placeholder="Digite o valor do item">

                </div>

                 
                <div class="input-group me-2">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-diagram-2"></i></span>
                    <select name='typeFilter' id='typeFilter' class="form-select" aria-label="tipo de item">
                        <option selected disabled>selecione o tipo</option>
                        @foreach($types as $type)
                            <option value="{{$type}}">{{$type}}</option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class='w-100 d-flex justify-content-end mt-4'>

                <input type="submit" class="btn btn-primary me-2" value="Pesquisar">

            </div>


        </div>



    </form>
    
</div>









{{-- 



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
    
</div> --}}