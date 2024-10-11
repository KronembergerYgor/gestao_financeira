<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormRegisterRevenuesAndExpenses extends Component
{
    public $route;
    public $method;
    public $spaceProjectId;
    public $types;
    public $categorys;
    public $register;
    public $titleButton;

    public function __construct($route, $method, $spaceProjectId, $types, $categorys, $register = null, $titleButton = 'Cadastrar')
    {
        $this->route             = $route;
        $this->method            = $method;
        $this->spaceProjectId    = $spaceProjectId;
        $this->types             = $types;
        $this->categorys         = $categorys;
        $this->register          = $register;
        $this->titleButton       = $titleButton;

    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-register-revenues-and-expenses');
    }
}
