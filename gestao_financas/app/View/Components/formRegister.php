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

    public function __construct($route, $method, $titleButton)
    {
        $this->route        = $route;
        $this->method       = $method;
        $this->titleButton  = $titleButton;

    }

    public function render()
    {
        return view('components.register');
    }



    // /**
    //  * Create a new component instance.
    //  */
    // public function __construct()
    // {
    //     //
    // }

    // /**
    //  * Get the view / contents that represent the component.
    //  */
    // public function render(): View|Closure|string
    // {
    //     return view('components.form-register');
    // }
}
