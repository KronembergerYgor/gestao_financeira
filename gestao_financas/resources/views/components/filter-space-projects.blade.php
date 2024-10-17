<div class="boxFilter card text-center mb-3 mt-3 d-flex flex-column p-0 shadow-lg"> 

    <form action="{{route($route)}}" method="POST">
        @csrf

        <div class="m-0 card-header text-start fw-bold">
            <h4 id="filterHeader"><i class="bi bi-search"></i> Filtro</h4>
        </div>

        <div class="cardBodyFilter card-body" id="filterBody" style="max-height: 0;">
            <div class="d-flex align-items-center">

                <div class="input-group w-25 me-2">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-kanban"></i></span>
                    <input type='text' name='projectFilter' id='projectFilter' class="form-control" placeholder="Digite o nome projeto" >

                </div>

                <div class="input-group w-25 me-2">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-chat-left-dots"></i></span>
                    <input type='text' name='descriptionFilter' id='descriptionFilter' class="form-control" placeholder="Digite a descrição do projeto" >

                </div>
                <button id="filterProjectsButton" class="btn btn-primary btn-sm">Pesquisar</button>

        
            </div>

        </div>

    </form>
    
</div>