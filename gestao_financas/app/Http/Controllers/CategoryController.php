<?php

namespace App\Http\Controllers;

use App\Models\CategoryRevenuesAndExpenses;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {   
        return view('category.index', [
            "categorys" => self::filterCategorys()

        ]); // Retorna a view de cadastro
    }

    public function filterCategorys()
    {   
        $categorys = CategoryRevenuesAndExpenses::select("*")->get();
        return $categorys;
    }

    public function create()
    {   
        return view('category.create');
    }


    public function save(Request $request)
    {  
        $request->validate([ //Valida os campos do formulário de cadastro
            'nameCategory'           => 'required',
        ], [
            'nameCategory.required' => 'O nome deve ser obrigatório.',
        ]);


        // Criação do novo registro
        CategoryRevenuesAndExpenses::create([
            'name' => $request->nameCategory,
            'description' => $request->descriptionCategory,
        ]);
        

        return redirect(route('category.index'))->with("categorys", self::filterCategorys());
        
    }

    public function destroy($id){
        $registro = CategoryRevenuesAndExpenses::findOrFail($id); // Localiza o registro pelo ID
        // $registro->posts()->delete();
        $registro->delete(); // Deleta o registro

        return redirect()->back()->with('success', 'Registro deletado com sucesso!');
    }

    public function edit($id){

        $register = CategoryRevenuesAndExpenses::where('id', $id)->first();

        return view('category.edit', ['register' => $register]);
    }

    public function update(Request $request, $id){

        $request->validate([ //Valida os campos do formulário de cadastro
            'nameCategory'           => 'required',
        ], [
            'name.required' => 'O nome deve ser obrigatório.',
        ]);
        

        CategoryRevenuesAndExpenses::where('id', $id)
        ->update([
            'name' => $request->nameCategory,
            'description' => $request->descriptionCategory,
       ]); 

        return redirect(route('category.index'))->with("success", "Registro alterado com sucesso");

    }

}
