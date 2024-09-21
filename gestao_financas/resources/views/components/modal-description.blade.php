      <!-- Modal -->
      <div class="modal fade" id="modal_item_{{$registro->id}}" tabindex="-1" aria-labelledby="modal_item_{{$registro->id}}" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modal_item_{{$registro->id}}_Label">{{$descriptionTitle}}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{$registro->description}}
            </div>
        </div>
        </div>
    </div>