<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class GraphicsController extends Controller
{
    public function values_expenses_for_category($type = null)
    {
        $expensesForCategory = DB::table('space_projects')
            ->leftJoin('revenues_and_expenses', 'space_projects.id', '=', 'revenues_and_expenses.space_project_id')
            ->join('category_revenues_and_expenses', 'revenues_and_expenses.category_id', 'category_revenues_and_expenses.id')
            ->where('space_projects.responsible_user', Auth::user()->id)
            ->select('category_revenues_and_expenses.name')
            ->selectRaw("SUM(IF(revenues_and_expenses.type = 'despesa', revenues_and_expenses.value, 0)) as despesa_geral")
            ->having('despesa_geral', '<>', 0)
            ->groupBy('revenues_and_expenses.category_id');
      
            if (!empty($type)) {
                $expensesForCategory = $expensesForCategory->where('space_projects.id', $type);
            }

            $expensesForCategory = $expensesForCategory->get();

        $dataset = [];
        foreach ($expensesForCategory as $item) {
            $dataset[] = [
                'label' => $item->name,
                'data' => [(float)$item->despesa_geral],
                'backgroundColor' => 'rgba(255, 99, 132, 0.2)',
                'borderColor' => 'rgba(255, 99, 132, 1)',
                'borderWidth' => 1,
            ];
        }

        $data = [
            'labels' => ['Despesas por categorias'],
            'datasets' => $dataset,
        ];

        return response()->json($data);
    }

    public function values_revenues_and_expenses($type = null)
    {
        $totals = DB::table('space_projects')
            ->leftJoin('revenues_and_expenses', 'space_projects.id', '=', 'revenues_and_expenses.space_project_id')
            ->where('space_projects.responsible_user', Auth::user()->id)
            ->selectRaw("SUM(IF(revenues_and_expenses.type = 'Receita', revenues_and_expenses.value, 0)) as receita_geral")
            ->selectRaw("SUM(IF(revenues_and_expenses.type = 'Despesa', revenues_and_expenses.value, 0)) as despesa_geral")
            ->selectRaw("SUM(IF(revenues_and_expenses.type = 'Receita', revenues_and_expenses.value, 0)) - SUM(IF(revenues_and_expenses.type = 'Despesa', revenues_and_expenses.value, 0)) as saldo");

        if (!empty($type)) {
            $totals = $totals->where('space_projects.id', $type);
        }

        $totals = $totals->first();

        $data = [
            'labels' => ['Receitas', 'Despesas'],
            'datasets' => [[
                'label' => 'Total',
                'data' => [(float)$totals->receita_geral, (float)$totals->despesa_geral],
                'backgroundColor' => [
                    'rgb(21 255 30 / 31%)',
                    'rgba(255, 99, 132, 0.2)',
                ],
                'borderColor' => [
                    'rgb(3 117 8)',
                    'rgba(255, 99, 132, 1)',
                ],
                'borderWidth' => 1,
            ]],
        ];

        return response()->json($data);
    }

    public function values_revenues_for_category($type = null)
    {
        $revenuesForCategory = DB::table('space_projects')
            ->leftJoin('revenues_and_expenses', 'space_projects.id', '=', 'revenues_and_expenses.space_project_id')
            ->join('category_revenues_and_expenses', 'revenues_and_expenses.category_id', 'category_revenues_and_expenses.id')
            ->where('space_projects.responsible_user', Auth::user()->id)
            ->select('category_revenues_and_expenses.name')
            ->selectRaw("SUM(IF(revenues_and_expenses.type = 'receita', revenues_and_expenses.value, 0)) as receita_geral")
            ->having('receita_geral', '<>', 0)
            ->groupBy('revenues_and_expenses.category_id');

            if (!empty($type)) {
                $revenuesForCategory = $revenuesForCategory->where('space_projects.id', $type);
            }

            $revenuesForCategory = $revenuesForCategory->get();

        $dataset = [];
        foreach ($revenuesForCategory as $item) {
            $dataset[] = [
                'label' => $item->name,
                'data' => [(float)$item->receita_geral],
                'backgroundColor' => 'rgb(21 255 30 / 31%)',
                'borderColor' => 'rgb(3 117 8)',
                'borderWidth' => 1,
            ];
        }

        $data = [
            'labels' => ['Receita por categorias'],
            'datasets' => $dataset,
        ];

        return response()->json($data);
    }

    public function values_cards($type = null)
    {
        $totals = DB::table('space_projects')
            ->leftJoin('revenues_and_expenses', 'space_projects.id', '=', 'revenues_and_expenses.space_project_id')
            ->where('space_projects.responsible_user', Auth::user()->id)
            ->selectRaw("SUM(IF(revenues_and_expenses.type = 'Receita', revenues_and_expenses.value, 0)) as receita_geral")
            ->selectRaw("SUM(IF(revenues_and_expenses.type = 'Despesa', revenues_and_expenses.value, 0)) as despesa_geral")
            ->selectRaw("SUM(IF(revenues_and_expenses.type = 'Receita', revenues_and_expenses.value, 0)) - SUM(IF(revenues_and_expenses.type = 'Despesa', revenues_and_expenses.value, 0)) as saldo");
    
        if (!empty($type)) {
            $totals = $totals->where('space_projects.id', $type);
        }
    
        $totals = $totals->first();
    
        // Prepare the data to return
        $data = [
            'receita_geral' => number_format((float)$totals->receita_geral, 2, ',', ''),
            'despesa_geral' => number_format((float)$totals->despesa_geral, 2, ',', ''),
            'saldo' => number_format((float)$totals->saldo, 2, ',', ''),
        ];
    
        return response()->json($data);
    }

    public function update_charts(Request $request)
    {
        $type = $request->input('type');
    
        $doughnutData = $this->values_revenues_and_expenses($type);
        $expenseData = $this->values_expenses_for_category($type);
        $revenueData = $this->values_revenues_for_category($type);
        $cardsValuesData = $this->values_cards($type);
    
        return response()->json([
            'doughnutData' => $doughnutData,
            'expenseData' => $expenseData,
            'revenueData' => $revenueData,
            'cardsValuesData' => $cardsValuesData,
        ]);
    }
}
