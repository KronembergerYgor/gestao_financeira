<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormRegisterProject extends Component
{
    public $route;
    public $method;
    public $nameButton;
    public $registro;
    public $idRoute;

    public function __construct($route, $method, $nameButton = "Salvar", $registro = null, $idRoute = null)
    {
        $this->route        = $route;
        $this->method       = $method;
        $this->nameButton   = $nameButton;
        $this->registro     = $registro;
        $this->$idRoute     = $idRoute;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-register-project');
    }
}
