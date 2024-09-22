<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilterRevenuesAndExpenses extends Component
{
    public $route;
    public $idRoute;
    public $types;
    public $categorys;

    public function __construct($route, $idRoute, $types = [], $categorys = [])
    {
        $this->route        = $route;
        $this->idRoute      = $idRoute;
        $this->types        = $types;
        $this->categorys    = $categorys;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filter-revenues-and-expenses');
    }
}
