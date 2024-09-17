@if (session('success') || session('error') || $errors->any()) <!-- Verifica se há mensagens a serem mostradas -->
    @if (session('success')) <!-- Verifica se a mensagem é de sucesso -->
        <div id='alert-message' class="alert alert-success float-end floating-content position-absolute">
            {{ session('success') }}
        </div>
    @elseif(session('error') || $errors->any()) <!-- Verifica se a mensagem é de erro -->
        <div id='alert-message' class="alert alert-danger float-end floating-content position-absolute">
            @if (session('error')) <!-- Verifica se a mensagem é do tipo erro -->
                {{ session('error') }}
            @elseif($errors->any()) <!-- Verifica se é um lista de erros -->
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif
@endif