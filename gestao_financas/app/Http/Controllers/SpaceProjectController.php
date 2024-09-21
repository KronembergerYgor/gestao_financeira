<?php

namespace App\Http\Controllers;

use App\Models\SpaceProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpaceProjectController extends Controller
{
    public function index(Request $request)
    {   
        return view('spaceProject.index', ['projects' => self::filterProjects($request)]); // Retorna a view de cadastro
    }

    public function registerProject(){
        return view('spaceProject.registerProject');
    }

    public function save(Request $request){

        $request->validate([ //Valida os campos do formulário de cadastro
            'nameProject'           => 'required'
        ], [
            'nameProject.required' => 'O nome do projeto deve ser obrigatório.',
        ]);

        // Criação do novo registro
        SpaceProject::create([
            'name' => $request->nameProject,
            'description' => $request->descriptionProject,
            'responsible_user' => Auth::user()->id
        ]);

        

        return redirect(route('spaceProject.index'))->with('projects', self::filterProjects($request));
    }

    public function filterProjects(Request $request){

        $projects = SpaceProject::where('responsible_user', Auth::user()->id);

        if(isset($request->descriptionFilter)){ //Filtro por descrição
            $projects = $projects->where("description", 'like', '%' . $request->descriptionFilter . '%');
        }
        if(isset($request->projectFilter)){//Filtro por nome
            $projects = $projects->where("name", 'like', '%' . $request->projectFilter . '%');

        }

       return $projects->paginate(6); //Retornando consulta com paginação por 6 itens
    }

    public function destroy($id){
        $registro = SpaceProject::findOrFail($id); // Localiza o registro pelo ID
        $registro->delete(); // Deleta o registro

        return redirect()->back()->with('success', 'Registro deletado com sucesso!');
    }
    
    public function edit($id){
        $project = SpaceProject::where('id', $id)->first();

        return view('spaceProject.edit', ['project' => $project]);
  
    }

    public function update(Request $request, $id){


        SpaceProject::where('id', $id)
        ->update([
            'name' => $request->nameProject,
            'description' => $request->descriptionProject
       ]);
        
        return redirect(route('spaceProject.index'))->with("success", "Registro alterado com sucesso");

    }

}
