@extends('ModelosLayout.site')

@section('titulo', 'Projetos')

@section('conteudo')

<x-menu-site></x-menu-site>

<div class="content" id="content">

        <h1>Projetos</h1>
        <hr>
        <div class="row border rounded p-5 m-5">

            @if(count($projects) > 0)

                @foreach($projects as $project)


                    <div class="card col-3 m-3 p-0">
                        <div class="card-header text-center ">
                            <h3>
                                {{$project->name}}
                            </h3>
                        </div>
                        <div class="card-body p-0">
                            @if(!empty($project->description))
                                
                                    @if(strlen($project->description) > 40)
                                        <p class="card-text p-3 mb-0">{{Str::limit($project->description, 40)}} <a class='cursor-pointer' style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#modal_item_{{$project->id}}">Ver mais</a> </p>

                                        

                                        <!-- Modal -->
                                        <div class="modal fade" id="modal_item_{{$project->id}}" tabindex="-1" aria-labelledby="modal_item_{{$project->id}}" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="modal_item_{{$project->id}}_Label">Descrição</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    {{$project->description}}
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    @else
                                        <p class="card-text p-3 mb-0">{{$project->description}}</p>
                                    @endif
                                    
                            @else
                            <p class="card-text p-3 mb-0">
                                Nenhuma descrição cadastrada
                            </p>
                            

                            
                            @endif

                            <div class="card-footer text-body-secondary d-flex justify-content-between">
                                <a href="#" class="btn btn-primary">Acessar Projeto</a>

                                <div>
                                    <a href="#" type="button" class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </a>
                
                                    <a href="#" type="button" class="btn btn-success">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                    
                @endforeach


            @else

                <span>Nenhum projeto cadastrado</span>


            @endif
       



        </div>

       




        <a type="button" class="btn btn-primary" href='{{route('spaceProject.registerProject')}}'>Criar espaço de projeto</a>
    </div>
          


  
      



</div>


@endsection



