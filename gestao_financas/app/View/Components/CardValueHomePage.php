<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardValueHomePage extends Component
{
    public $title;
    public $value;
    public $icon;

    public function __construct($value, $title, $icon)
    {
        $this->title        = $title;
        $this->value        = $value;
        $this->icon         = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-value-home-page');
    }
}
