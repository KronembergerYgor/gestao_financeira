@if(!auth()->check()) <!-- Verificando se o usuário está logado -->

    <form action="{{route('login.enter')}}" method="POST">

        <div style=' padding: 1rem 5rem'>

            @csrf <!-- Token CSRF para proteger contra ataques CSRF -->
            <div class="input-group mb-4 mt-3"> <!-- área do input de email -->
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
                <input name='email' id='email' type="email" class="form-control" placeholder="Digite seu e-mail" aria-label="email" aria-describedby="basic-addon1">
            </div>
    
            <div class="input-group mb-2"><!-- área do input de senha -->
                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
                <input name='password' id='password' type="password" class="form-control" placeholder="Digite sua senha" aria-label="password" aria-describedby="basic-addon1">
            </div>


        </div>
        <button type="submit" class="btn btn-primary mt-1 w-25">Entrar</button> <!-- área do botão de submit -->

    </form>

    <hr>

    <div class='boxPassword row'> 
        <div class="rememberPassword col d-flex justify-content-center">
            <a href="{{route('password.request')}}">Esqueceu a senha?</a> <!-- Esquecimento de senha -->
        </div>
        <div class='col'>
            <a type="button" class="btn btn-secondary" href='{{route('RegisterUser.index')}}'>Cadastre-se</a> <!-- Área para cadastro -->
        </div>
    </div>
        
@else
    <div class='welcomeText'> <!-- área usada caso o usuário já esteja com sessão aberta no sistema -->
        <h4>Olá, {{ auth()->user()->name }}!</h4>
        <p>Estamos felizes em tê-lo aqui.</p>
        <p>Explore as funcionalidades e aproveite ao máximo sua experiência.</p>
        <p>Tenha um ótimo dia!</p>
    </div>
        <hr>
        <a type="button" class="btn btn-primary" href='{{route('home.index')}}'>Acessar</a> <!-- Botão para levar a home do sistema -->
           
@endif