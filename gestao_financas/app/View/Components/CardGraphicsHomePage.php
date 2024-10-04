<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardGraphicsHomePage extends Component
{
    
    public $idGraphic;
    public $title;
    public $icon;
    public $cols;

    public function __construct($idGraphic, $title, $icon,  $cols = "col-md-5 col-sm-12")
    {
        $this->idGraphic    = $idGraphic;
        $this->title        = $title;
        $this->icon         = $icon;
        $this->cols         = $cols;
        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-graphics-home-page');
    }
}
