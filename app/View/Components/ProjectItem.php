<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Proyecto;

class ProjectItem extends Component
{
    public $proyecto;

    /**
     * Create a new component instance.
     *
     * @param Proyecto $proyecto
     */
    public function __construct($proyecto)
    {
        $this->proyecto = $proyecto;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.project-item');
    }
}
