<div class="sidebar" id="sidebar">
    <div class='row'>
        <div class='col-10 text-center'>
                
            @if(isset(Auth::user()->photo))
                <img  style="width: 100px; height: 100px;" id='userPhoto' class='border rounded-circle' src="{{ asset(Auth::user()->photo)  }}" alt="Foto do Perfil">
            @else
                <i class="defautPhoto bi bi-person-circle" style="width: 100px; height: 100px; font-size:100px;"></i>
            @endif

            <h2  class='m-0 text-center fs-4 mb-1 mt-2'>
                {{explode(' ', Auth::user()->name)[0]}}
            </h2>
            
        </div>
        <div class='col-2'>
            <button class="toggle-btn"><i class="bi bi-list"></i></button>
        </div>
    </div>
    
    <ul>
        <hr>
        <li><a class='fs-5' href="{{route('perfil.index')}}"><i class="bi bi-person-fill"></i> Perfil Usuário</a></li>
        <li><a class='fs-5' href="{{route('home.index')}}"><i class="bi bi-house-door-fill"></i> Início</a></li>
        <li><a class='fs-5' href="{{route('spaceProject.index')}}"><i class="bi bi-kanban"></i> Projetos</a></li>
        <li><a class='fs-5' href="{{route('category.index')}}"><i class="bi bi-bookmark-fill"></i> Categorias</a></li>
        {{-- <li><a href="{{route('status.index')}}">Status</a></li> --}}
        <hr>
        <li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class='btn btn-danger' type="submit"><i class="bi bi-box-arrow-left"></i></button>
            </form>
        </li>
    </ul>
</div>