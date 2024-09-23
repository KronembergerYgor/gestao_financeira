<?php

namespace App\Http\Controllers;

use App\Models\RecipeStatus;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function index(Request $request)
    {   
        return view('status.index',[
            'registers' => self::filterStatus($request)
        ]);
    }
    public function filterStatus(Request $request)
    {   
        $status = RecipeStatus::select("*");

        if(isset($request->nameStatusFilter)){
            $status = $status->where("name", "like", "%" . $request->nameStatusFilter . "%");
        }

        if(isset($request->descriptionStatusFilter)){
            $status = $status->where("name", "like", "%" . $request->descriptionStatusFilter . "%");
        }

        if(isset($request->idStatusFilter)){
            $status = $status->where("id", $request->idStatusFilter);
        }


        return $status->paginate(10);
    }

    public function create()
    {   
        return view('status.create');
    }


    public function save(Request $request)
    {  
        $request->validate([ //Valida os campos do formulário de cadastro
            'nameStatus'           => 'required',
        ], [
            'nameStatus.required' => 'O nome deve ser obrigatório.',
        ]);

        // Criação do novo registro
        RecipeStatus::create([
            'name' => $request->nameStatus,
            'description' => $request->descriptionStatus,
        ]);
        
        return redirect(route('status.index'))->with("registers", self::filterStatus($request));
        
    }

    public function destroy($id){
        $registro = RecipeStatus::findOrFail($id); // Localiza o registro pelo ID
        // $registro->posts()->delete();
        $registro->delete(); // Deleta o registro

        return redirect()->back()->with('success', 'Registro deletado com sucesso!');
    }

    public function edit($id){

        $register = RecipeStatus::where('id', $id)->first();

        return view('status.edit', ['register' => $register]);
    }

    public function update(Request $request, $id){

        $request->validate([ //Valida os campos do formulário de cadastro
            'nameStatus'           => 'required',
        ], [
            'nameStatus.required' => 'O nome deve ser obrigatório.',
        ]);
        

        RecipeStatus::where('id', $id)
        ->update([
            'name' => $request->nameStatus,
            'description' => $request->descriptionStatus,
       ]); 

        return redirect(route('status.index'))->with("success", "Registro alterado com sucesso");

    }
}
