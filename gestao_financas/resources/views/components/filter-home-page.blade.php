<div class="boxFilter card text-center mb-3 d-flex flex-column p-0 shadow-lg"> 

    <div class="m-0 card-header text-start fw-bold">
        <h4 id="filterHeader"><i class="bi bi-search"></i> Filtro</h4>
    </div>

    <div class="cardBodyFilter card-body" id="filterBody" style="max-height: 0;">
        <div class="d-flex align-items-center">
            <div class="input-group w-25 me-2">
                <span class="input-group-text"><i class="bi bi-search"></i></span>
                <select name='type' id='type' class="form-select" aria-label="Default select example">
                    <option selected value=''>Todos</option>
                    @foreach($registers as $register)
                        <option value="{{ $register->id }}">{{ $register->name }}</option>
                    @endforeach
                </select>
            </div>
            <button id="filterButton" class="btn btn-primary btn-sm">Filtrar</button>
        </div>
    </div>

</div>