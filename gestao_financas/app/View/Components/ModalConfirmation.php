<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalConfirmation extends Component
{
    public $id;
    public $textDescription;
    public $actionRoute;
    public $method;
    public $buttonClose;
    public $buttonAccept;
    public $idRoute;

    public function __construct($id, $textDescription = null, $actionRoute, $method, $buttonClose = 'Fechar', $buttonAccept = "Confirmar", $idRoute)
    {

        $this->id               = $id;
        $this->textDescription  = $textDescription;
        $this->actionRoute      = $actionRoute;
        $this->method           = $method;
        $this->buttonClose      = $buttonClose;
        $this->buttonAccept     = $buttonAccept;
        $this->idRoute          = $idRoute;


    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal-confirmation');
    }
}
