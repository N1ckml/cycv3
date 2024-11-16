<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProjectItemHeader extends Component
{
    public $tituloProyecto;

    /**
     * Create a new component instance.
     *
     * @param string $tituloProyecto
     */
    public function __construct($tituloProyecto)
    {
        $this->tituloProyecto = $tituloProyecto;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.project-item-header');
    }
}