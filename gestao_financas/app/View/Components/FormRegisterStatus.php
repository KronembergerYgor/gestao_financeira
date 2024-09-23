<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormRegisterStatus extends Component
{
    public $route;
    public $method;
    public $registro;

    public function __construct($route, $method, $registro = null)
    {
        $this->route        = $route;
        $this->method       = $method;
        $this->registro     = $registro;


    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-register-status');
    }
}
