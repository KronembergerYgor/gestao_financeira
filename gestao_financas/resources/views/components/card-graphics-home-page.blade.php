<div class="cardGraphics card {{$cols}} text-center mb-3 d-flex flex-column p-0 shadow-lg"> 
    <div class="m-0 card-header text-start fw-bold">
        <h4>
            {!! $icon !!} {{$title}}
        </h4>
    </div>
    <div class="card-body d-flex align-items-center justify-content-center">
        <canvas id="{{$idGraphic}}" style="max-height: 300px; width: 100%;"></canvas>
    </div>
    <div class="card-footer text-body-secondary">
        Atualizado em: <b>  {{ \Carbon\Carbon::now()->format('d/m/Y H:i:s') }} </b>
    </div>
</div>

