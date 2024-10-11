<?php

namespace App\Http\Controllers;

use App\Models\RecipeStatus;
use App\Models\RevenuesAndExpenses;
use App\Models\SpaceProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\select;

class SpaceProjectController extends Controller
{
    public function index(Request $request)
    {   
       $status = RecipeStatus::select("*")->get();
        return view('spaceProject.index', [
            'projects' => self::filterProjects($request),
            'status' => $status
        ]); // Retorna a view de cadastro
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

        $projects = SpaceProject::select(
            'space_projects.id as id',
            'space_projects.created_at as created_at',
            'space_projects.updated_at as updated_at',
            'space_projects.name as name',
            'space_projects.description as description',
            'space_projects.responsible_user as responsible_user',
            'space_projects.recipe_status_id as recipe_status_id',
        )
        ->selectRaw("sum(if(revenues_and_expenses.type = 'Receita', revenues_and_expenses.value, 0)) as receita_geral ")
        ->selectRaw("sum(if(revenues_and_expenses.type = 'Despesa', revenues_and_expenses.value, 0)) as despesa_geral")
        ->selectRaw("ROUND(CASE WHEN (SUM(IF(revenues_and_expenses.type = 'Receita', revenues_and_expenses.value, 0)) + SUM(IF(revenues_and_expenses.type = 'Despesa', revenues_and_expenses.value, 0))) != 0 
        THEN ((SUM(IF(revenues_and_expenses.type = 'Receita', revenues_and_expenses.value, 0)) - SUM(IF(revenues_and_expenses.type = 'Despesa', revenues_and_expenses.value, 0))) / 
              (SUM(IF(revenues_and_expenses.type = 'Receita', revenues_and_expenses.value, 0)) + SUM(IF(revenues_and_expenses.type = 'Despesa', revenues_and_expenses.value, 0))) * 100)
        ELSE 0 END, 2) as porcentagem")
        ->selectRaw("(sum(if(revenues_and_expenses.type = 'Receita', revenues_and_expenses.value, 0)) - sum(if(revenues_and_expenses.type = 'Despesa', revenues_and_expenses.value, 0))) as saldo")    
        ->leftJoin('revenues_and_expenses', 'space_projects.id', '=', 'revenues_and_expenses.space_project_id')
        ->where('space_projects.responsible_user', Auth::user()->id)
        ->groupBy('space_projects.id');


        if(isset($request->descriptionFilter)){ //Filtro por descrição
            $projects = $projects->where("space_projects.description", 'like', '%' . $request->descriptionFilter . '%');
        }
        if(isset($request->projectFilter)){//Filtro por nome
            $projects = $projects->where("space_projects.name", 'like', '%' . $request->projectFilter . '%');

        }

       return $projects->get(); //Retornando consulta com paginação por 6 itens
    }


    public function destroy($id){
        $registro = SpaceProject::findOrFail($id); // Localiza o registro pelo ID

       
        $registersProject = RevenuesAndExpenses::select('id')->where('space_project_id', $id);

        if(count($registersProject->get()) > 0){
            $registersProject->delete();
        }

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
