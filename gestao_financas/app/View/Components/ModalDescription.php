<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalDescription extends Component
{
    public $descriptionTitle;
    public $registro;
    /**
     * Create a new component instance.
     */
    public function __construct($descriptionTitle, $registro)
    {
        $this->descriptionTitle = $descriptionTitle;
        $this->registro         = $registro;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-description');
    }

}