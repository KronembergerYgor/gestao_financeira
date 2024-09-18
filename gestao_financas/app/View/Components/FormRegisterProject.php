<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormRegisterProject extends Component
{
    public $route;
    public $method;

    public function __construct($route, $method)
    {
        $this->route        = $route;
        $this->method       = $method;

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-register-project');
    }
}
