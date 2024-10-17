<div class="boxFilter card text-center mb-3 mt-3 d-flex flex-column p-0 shadow-lg"> 

    <div class="m-0 card-header text-start fw-bold">
        <h4 id="filterHeader"><i class="bi bi-search"></i> Filtro</h4>
    </div>

    <form action="{{route($route)}}" method="POST">

        <div class="cardBodyFilter card-body row" id="filterBody" style="max-height: 0;">

                @csrf
                
                <div class="input-group me-2 col">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-gear-wide"></i></span>
                    <input type="number" class="form-control" id="idCategoryFilter" name="idCategoryFilter" placeholder="Digite o ID da categoria">
                 
                </div>    
        
                <div class="input-group me-2 col">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-bookmark-fill"></i></span>
                    <input type="text" class="form-control" id="nameCategoryFilter" name="nameCategoryFilter" placeholder="Digite nome da categoria">
                 
                </div>    
        
                <div class="input-group me-2 col">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-chat-left-dots"></i></span>
                    <input type="text" class="form-control" id="descriptionCategoryFilter" name="descriptionCategoryFilter" placeholder="Digite a descrição da categoria">
                    
                </div>
                
                <div class='col-12 d-flex justify-content-end mt-3'>
                    <input type="submit" class="btn btn-primary" value="Pesquisar">


                </div>
    

        </div>
    </form>

  
    
</div>