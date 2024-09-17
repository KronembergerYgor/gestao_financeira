<div class="sidebar" id="sidebar">
    <div class='row'>
        <div class='col-10'>
            <h2>Olá, </h2>
        </div>
        <div class='col-2'>
            <button class="toggle-btn"><i class="bi bi-list"></i></button>
        </div>
    </div>
    
    <ul>
        <hr>
        <li><a href="#home">Início</a></li>
        <li><a href="#services">Projetos</a></li>
        <li><a href="#about">Cadastrar projetos</a></li>
        <hr>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class='btn btn-danger' type="submit"><i class="bi bi-box-arrow-left"></i></button>
            </form>
        </li>
    </ul>
</div>