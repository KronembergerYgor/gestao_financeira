<form action="{{route($route)}}" method='{{$method}}' enctype="multipart/form-data">

    <div class='row'>

        <div class='col-6'>
            @csrf <!-- Token CSRF para proteger contra ataques CSRF -->
            <div class="input-group mb-4 mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                <input name="nameUser" id="nameUser" type="text" class="form-control" placeholder="Digite seu nome senha" aria-label="Name" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-4 mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                <input name="password" id="password" type="password" class="form-control" placeholder="Digite sua senha" aria-label="password" aria-describedby="basic-addon1">
            </div>

        </div>

        <div class='col-6'>

            <div class="input-group mb-4 mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
                <input name="email" id="email" type="email" class="form-control" placeholder="Digite seu e-mail" aria-label="email" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-4 mt-3">
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                <input name="confirmPassword" id="confirmPassword" type="password" class="form-control" placeholder="Confirme sua senha" aria-label="confirmPassword" aria-describedby="basic-addon1">
            </div>
            
        </div>
        <div class="col-12">
            <div class="input-group mb-4 mt-1" >
                <input name="imageUser" id="imageUser" type="file" class="form-control">
            </div>
        </div>
       
    </div>

    <div>
        <input type="submit" class="btn btn-primary w-100" value="Cadastre-se">
    </div>

</form>


