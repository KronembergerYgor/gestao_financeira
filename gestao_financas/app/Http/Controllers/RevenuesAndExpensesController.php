<?php

namespace App\Http\Controllers;

use App\Models\CategoryRevenuesAndExpenses;
use App\Models\RevenuesAndExpenses;
use Illuminate\Http\Request;

class RevenuesAndExpensesController extends Controller
{
    public function index(Request $request, $spaceProjectId)
    {   

        // dd(self::filterRevenuesAndExpenses($request, $spaceProjectId));
        return view('revenuesAndExpenses.index', [
            'registers' => self::filterRevenuesAndExpenses($request, $spaceProjectId),
            'spaceProjectId' => $spaceProjectId
    
    ]); // Retorna a view de cadastro
    }

    public function filterRevenuesAndExpenses(Request $request, $spaceProjectId){

        $projects = RevenuesAndExpenses::select(
                'revenues_and_expenses.id',
                'revenues_and_expenses.name',
                'revenues_and_expenses.description',
                'revenues_and_expenses.type',
                'revenues_and_expenses.value',
                'space_projects.id as space_project_id',
                'space_projects.name as space_project_name',
                'category_revenues_and_expenses.name as category_revenues_and_expenses_name',
                'revenues_and_expenses.updated_at',
                'revenues_and_expenses.created_at'

        )
        ->join('space_projects', 'space_projects.id', '=', 'revenues_and_expenses.space_project_id')
        ->join('category_revenues_and_expenses', 'category_revenues_and_expenses.id', '=', 'revenues_and_expenses.category_id')
        ->where('space_project_id', $spaceProjectId);

       return $projects->paginate(10); //Retornando consulta com paginação por 6 itens
    } 

    public function create(Request $request, $spaceProjectId)
    {  
        $types = [
            "Receita",
            "Despesa"
        ];
        
        $categorys = CategoryRevenuesAndExpenses::select("*")->get();

        return view('revenuesAndExpenses.create', ["spaceProjectId" => $spaceProjectId, "categorys" => $categorys, "types" => $types]);
    }

    
    public function save(Request $request, $spaceProjectId)
    {  

        // dd($request->all());
        
        $request->validate([ //Valida os campos do formulário de cadastro
            'name'           => 'required',
            'type'           => 'required',
            'value'          => 'required',
        ], [
            'name.required' => 'O nome deve ser obrigatório.',
            'type.required' => 'O tipo deve ser obrigatório.',
            'value.required' => 'O valor deve ser obrigatório.'
        ]);

        // Criação do novo registro
        RevenuesAndExpenses::create([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'value' => str_contains($request->value, ",") ? str_replace($request->value, ",", ".") : $request->value,
            'space_project_id' => $spaceProjectId,
            'category_id' => $request->category
        ]);
        
        
        return redirect(route('revenuesAndExpenses.index', $spaceProjectId))->with("spaceProjectId", $spaceProjectId);
        
    }

    public function destroy($id){
        $registro = RevenuesAndExpenses::findOrFail($id); // Localiza o registro pelo ID
        $registro->delete(); // Deleta o registro

        return redirect()->back()->with('success', 'Registro deletado com sucesso!');
    }
}
