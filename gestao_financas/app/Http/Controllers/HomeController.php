<?php

namespace App\Http\Controllers;

use App\Models\RevenuesAndExpenses;
use App\Models\SpaceProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){

        $totals = DB::table('space_projects')
        ->leftJoin('revenues_and_expenses', 'space_projects.id', '=', 'revenues_and_expenses.space_project_id')
        ->where('space_projects.responsible_user', Auth::user()->id)
        ->selectRaw("FORMAT(SUM(IF(revenues_and_expenses.type = 'Receita', revenues_and_expenses.value, 0)), 2) as receita_geral")
        ->selectRaw("FORMAT(SUM(IF(revenues_and_expenses.type = 'Despesa', revenues_and_expenses.value, 0)), 2) as despesa_geral")
        ->selectRaw("FORMAT((SUM(IF(revenues_and_expenses.type = 'Receita', revenues_and_expenses.value, 0)) - SUM(IF(revenues_and_expenses.type = 'Despesa', revenues_and_expenses.value, 0))), 2) as saldo")
        ->first();

       
        return view('homeIndex.index', [
            'totals' => $totals

        ]); // Retorna a view de cadastro //Retorna a View da home
    }
}
