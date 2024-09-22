<?php

namespace App\Http\Controllers;

use App\Models\CategoryRevenuesAndExpenses;
use App\Models\RevenuesAndExpenses;
use Illuminate\Http\Request;

class RevenuesAndExpensesController extends Controller
{
    public function index(Request $request, $spaceProjectId)
    {   

        $categorys = CategoryRevenuesAndExpenses::select("*")->get();
        $types = [
            "Receita",
            "Despesa"
        ];

        // dd(self::filterRevenuesAndExpenses($request, $spaceProjectId));
        return view('revenuesAndExpenses.index', [
            'registers' => self::filterRevenuesAndExpenses($request, $spaceProjectId),
            'spaceProjectId' => $spaceProjectId,
            'types' => $types,
            'categorys' => $categorys
    
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


        if(isset($request->idItemFilter)){
            $projects = $projects->where('revenues_and_expenses.id', $request->idItemFilter);
        }

        // if(isset($request->ProjectNameFilter)){
        //     $projects = $projects->where('space_projects.name', 'like', "%" . $request->ProjectNameFilter . "%");
        // }

        if(isset($request->nameFilter)){
            $projects = $projects->where('revenues_and_expenses.name', 'like', "%" . $request->nameFilter . "%");
        }


        if(isset($request->typeFilter)){
            $projects = $projects->where('revenues_and_expenses.type', 'like', "%" . $request->typeFilter . "%");
        }


        if(isset($request->categoryFilter)){
            $projects = $projects->where('revenues_and_expenses.category_id', $request->categoryFilter);
        }


        if(isset($request->valueFilter)){
            $projects = $projects->where('revenues_and_expenses.value', $request->valueFilter);
        }

        if(isset($request->descriptionFilter)){
            $projects = $projects->where('revenues_and_expenses.description', 'like', "%" . $request->descriptionFilter . "%");
        }



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
        // $registro->posts()->delete();
        $registro->delete(); // Deleta o registro

        return redirect()->back()->with('success', 'Registro deletado com sucesso!');
    }

    public function edit($id){

        $register = RevenuesAndExpenses::where('id', $id)->first();

        $types = [
            "Receita",
            "Despesa"
        ];
        
        $categorys = CategoryRevenuesAndExpenses::select("*")->get();

        return view('revenuesAndExpenses.edit', ['register' => $register, 'categorys' => $categorys, 'types' => $types, ]);
    }

    public function update(Request $request, $id){

        $request->validate([ //Valida os campos do formulário de cadastro
            'name'           => 'required',
            'type'           => 'required',
            'value'          => 'required',
        ], [
            'name.required' => 'O nome deve ser obrigatório.',
            'type.required' => 'O tipo deve ser obrigatório.',
            'value.required' => 'O valor deve ser obrigatório.'
        ]);
        

        RevenuesAndExpenses::where('id', $id)
        ->update([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'value' => str_contains($request->value, ",") ? str_replace($request->value, ",", ".") : $request->value,
            'category_id' => $request->category
       ]); 

       $register = RevenuesAndExpenses::select('space_project_id')->where('id', $id)->first();

        return redirect(route('revenuesAndExpenses.index', $register->space_project_id))->with("success", "Registro alterado com sucesso");

    }
}
