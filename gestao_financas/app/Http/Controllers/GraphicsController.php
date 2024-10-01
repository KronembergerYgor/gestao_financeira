<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GraphicsController extends Controller
{
    public function values_expenses_for_category()
    {
        $expensesForCategory = DB::table('space_projects')
        ->leftJoin('revenues_and_expenses', 'space_projects.id', '=', 'revenues_and_expenses.space_project_id')
        ->join('category_revenues_and_expenses', 'revenues_and_expenses.category_id', 'category_revenues_and_expenses.id')
        ->where('space_projects.responsible_user', Auth::user()->id)
        ->select('category_revenues_and_expenses.name')
        ->selectRaw("FORMAT(SUM(IF(revenues_and_expenses.type = 'Despesa', revenues_and_expenses.value, 0)), 2) as despesa_geral")
        ->having('despesa_geral','<>', 0 )
        ->groupBy(['revenues_and_expenses.category_id'])
        ->get();

        $dataset = [];
        foreach($expensesForCategory as $item){
            $dataset[] = [
                'label' => $item->name,
                'data' => $item->despesa_geral,
                'borderWidth' => 1,
                // 'backgroundColor'=> 'rgba(255, 99, 132, 0.2)',
                // 'borderColor'=> 'rgba(255, 99, 132, 1)',  


            ];
        }

        // Aqui você pode coletar os dados do banco de dados.
        $data = [
            'labels' => ['Despesas por categorias'],
            'datasets' => $dataset
        ];
        
        return response()->json($data);
    }

    public function values_revenues_and_expenses()
    {
        $totals = DB::table('space_projects')
        ->leftJoin('revenues_and_expenses', 'space_projects.id', '=', 'revenues_and_expenses.space_project_id')
        ->where('space_projects.responsible_user', Auth::user()->id)
        ->selectRaw("FORMAT(SUM(IF(revenues_and_expenses.type = 'Receita', revenues_and_expenses.value, 0)), 2) as receita_geral")
        ->selectRaw("FORMAT(SUM(IF(revenues_and_expenses.type = 'Despesa', revenues_and_expenses.value, 0)), 2) as despesa_geral")
        ->selectRaw("FORMAT((SUM(IF(revenues_and_expenses.type = 'Receita', revenues_and_expenses.value, 0)) - SUM(IF(revenues_and_expenses.type = 'Despesa', revenues_and_expenses.value, 0))), 2) as saldo")
        ->first();

        $dataset = [];
        $dataset[] = [
            'label'=> ['Receita', 'Despesas'],
            'data'=> [$totals->receita_geral, $totals->despesa_geral],
            'backgroundColor'=> [
                'rgb(21 255 30 / 31%)',
                'rgba(255, 99, 132, 0.2)',
            ],
            'borderColor'=> [
                'rgb(3 117 8)',                
                'rgba(255, 99, 132, 1)',
            ],
            'borderWidth'=> 1
        ];

        // Aqui você pode coletar os dados do banco de dados.
        $data = [
            'labels' => ['Receitas', 'Despesas'],
            'datasets' => $dataset
        ];
        
        return response()->json($data);
    }


}
