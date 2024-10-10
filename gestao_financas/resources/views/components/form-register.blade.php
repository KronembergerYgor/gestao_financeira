<form action="{{route($route)}}" method='POST' enctype="multipart/form-data">
    <div class='contentForm row'>
        <div class='col-6'>
            @csrf
            @method($method)
            <div class="input-group mb-4 mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                <input name="nameUser" id="nameUser" type="text" class="form-control" placeholder="Digite seu nome" aria-label="Name" aria-describedby="basic-addon1" value="{{ old('nameUser', isset($register) ? $register->name : '') }}">
            </div>

            <div class="input-group mb-4 mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                <input name="password" id="password" type="password" class="form-control" placeholder="Digite sua senha" aria-label="password" aria-describedby="basic-addon1">
            </div>
        </div>

        <div class='col-6'>
            <div class="input-group mb-4 mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
                <input name="email" id="email" type="email" class="form-control" placeholder="Digite seu e-mail" aria-label="email" aria-describedby="basic-addon1" value="{{ old('email', isset($register) ? $register->email : '') }}">
            </div>

            <div class="input-group mb-4 mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                <input name="confirmPassword" id="confirmPassword" type="password" class="form-control" placeholder="Confirme sua senha" aria-label="confirmPassword" aria-describedby="basic-addon1">
            </div>
        </div>

        <div class="col-9">
            <div class="input-group mb-1 mt-1">
                <input name="imageUser" id="imageUser" type="file" class="form-control">
                <!-- Exibir a imagem atual -->
                @if(isset($register) && $register->photo)
                    <input type="hidden" name="current_photo" value="{{ $register->photo }}">
                @endif
            </div>
        </div>

        
        <div class="col-3">
            <div class="btn-group  d-flex justify-content-center mt-1" role="group" aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="removePhoto" name='removePhoto' autocomplete="off">
                <label class="btn btn-outline-secondary btn" for="removePhoto">Remover foto</label>
            </div>
        </div>


    </div>

    <hr>

    <div class='d-flex justify-content-center'>
        <input type="submit" class="btn btn-primary" value="{{$titleButton}}">
        <button class="btn btn-outline-danger ms-2" onclick='history.back()'>Cancelar</button>
    </div>



</form>


