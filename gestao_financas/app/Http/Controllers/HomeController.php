<?php

namespace App\Http\Controllers;

use App\Models\RevenuesAndExpenses;
use App\Models\SpaceProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request){

        $projects = SpaceProject::where('responsible_user', Auth::user()->id)
        ->get();

        return view('homeIndex.index', [
            'projects' => $projects

        ]); // Retorna a view de cadastro //Retorna a View da home
    }
}
