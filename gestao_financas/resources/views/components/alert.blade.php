@if (session('success') || session('error') || $errors->any())
    @if (session('success'))
        <div id='alert-message' class="alert alert-success float-end floating-content position-absolute">
            {{ session('success') }}
        </div>
    @elseif(session('error') || $errors->any())
        <div id='alert-message' class="alert alert-danger float-end floating-content position-absolute">
            @if (session('error'))
                {{ session('error') }}
            @elseif($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif
@endif