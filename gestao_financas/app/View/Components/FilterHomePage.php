<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FilterHomePage extends Component
{
    public $registers;
    public function __construct($registers)
    {
        $this->registers = $registers;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.filter-home-page');
    }
}
