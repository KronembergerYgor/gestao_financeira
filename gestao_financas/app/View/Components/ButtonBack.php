<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonBack extends Component
{
    public $route;
    public $idRoute;

    public function __construct($route, $idRoute = null)
    {
        $this->route        = $route;
        $this->idRoute      = $idRoute;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button-back');
    }
}
