<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class formRegister extends Component
{

    public $route;
    public $method;
    public $titleButton;
    public $register;

    public function __construct($route, $method, $titleButton = "Cadastre-se", $register = null)
    {
        $this->route        = $route;
        $this->method       = $method;
        $this->titleButton  = $titleButton;
        $this->register     = $register;

    }

    public function render()
    {
        return view('components.register');
    }

}
