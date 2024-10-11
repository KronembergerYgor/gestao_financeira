
<form method="POST" action="{{ !isset($register) ? route($route, $spaceProjectId) : route($route, $register->id)}}" enctype="multipart/form-data">

    @csrf 
    @method($method)

    <div class="row contentForm">

        <div class="col-6">

            <div class="input-group mb-4 mt-3">
                <span class="input-group-text"><i class="bi bi-book"></i></span>
                <input name="name" id="name" type="text" class="form-control" placeholder="Digite o nome" aria-label="name" aria-describedby="basic-addon1" value="{{ old('name', isset($register) ? $register->name : '') }}">
            </div>

            <div class="input-group mb-4 mt-3">
                <span class="input-group-text"><i class="bi bi-award"></i></span>
                <select name='type' id='type' class="form-select" aria-label="Default select example">
                    <option selected disabled>selecione o tipo</option>

                    @if(!isset($register->type))
                        
                        @foreach($types as $type)
                            <option value="{{$type}}">{{$type}}</option>
                        @endforeach

                    @else

                        @foreach($types as $type)
                            @if(mb_strtoupper($type) == mb_strtoupper($register->type))
                                <option selected value="{{$register->type}}">{{$register->type}}</option>
                            @else
                                <option value="{{$type}}">{{$type}}</option>
                            @endif

                        @endforeach


                    @endif


               
                </select>
            </div>
    
        </div>

        <div class="col-6">

            <div class="input-group mb-4 mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-currency-dollar"></i></span>
                <input name="value" id="value"  step="0.01" type="number" class="form-control" placeholder="Digite o Valor" aria-label="value" aria-describedby="basic-addon1" value="{{ old('value', isset($register) ? $register->value : '') }}">
            </div>

            <div class="input-group mb-4 mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-bookmark"></i></span>
                <select name='category' id='category' class="form-select" aria-label="Default select example">
                    <option selected disabled>selecione a categoria</option>

                    @if(!isset($register))
                        
                        @foreach($categorys as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach

                    @else

                        @foreach($categorys as $category)
                            @if($category->id == $register->category_id)
                                <option selected value="{{$category->id}}">{{$category->name}}</option>
                            @else
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endif

                        @endforeach


                    @endif
                   
           

                </select>
            </div>

        </div>

        <div class="col-12">
            <div class="input-group mb-4 mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-chat-dots"></i></span>
                <textarea class="form-control" placeholder="Descrição do item" name="description" id="description" style="height: 100px">{{ old('description', isset($register) ? $register->description : '') }}</textarea>
            </div>
        </div>

    </div>
    <hr>
    <div class='d-flex justify-content-center'>
        <input type="submit" class='btn btn-primary' value="{{$titleButton}}">
        <button type="button" class="btn btn-outline-danger ms-2" onclick="history.back()">Cancelar</button>

    </div>

</form>