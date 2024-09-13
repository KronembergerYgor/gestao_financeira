<form action="{{route($route)}}" method='{{$method}}'>

    <div class='row'>

        <div class='col-6'>

            <div class="input-group mb-4 mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                <input type="text" class="form-control" placeholder="Digite seu nome senha" aria-label="Name" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-4 mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                <input type="password" class="form-control" placeholder="Digite sua senha" aria-label="password" aria-describedby="basic-addon1">
            </div>

        </div>

        <div class='col-6'>

            <div class="input-group mb-4 mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
                <input type="email" class="form-control" placeholder="Digite seu e-mail" aria-label="email" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-4 mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                <input type="password" class="form-control" placeholder="Confirme sua senha" aria-label="password" aria-describedby="basic-addon1">
            </div>
            
        </div>
        <div class="col-12">
            <div class="input-group mb-4 mt-1">
                <input type="file" class="form-control" id="exampleFormControlFile1">
            </div>
        </div>
       
    </div>

    <div>
        <a type="button" class="btn btn-primary w-100" href='{{route('RegisterUser.index')}}'>Cadastre-se</a>
    </div>

</form>


