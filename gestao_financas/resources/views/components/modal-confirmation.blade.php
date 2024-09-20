<div class="modal fade " id='{{$id}}' tabindex="-1" aria-labelledby='{{$id}}' aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-danger text-light">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="{{$id}}">Exclusão</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {!! $textDescription !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{$buttonClose}}</button>
          <form action="{{ route($actionRoute, $idRoute) }}" method="POST"> <!-- Sempre POST -->
            @csrf
            @method('DELETE') <!-- Deixe o método DELETE aqui -->
            <button type="submit" class="btn btn-outline-light">{{$buttonAccept}}</button>
          </form>
        </div>
      </div>
    </div>
</div>
