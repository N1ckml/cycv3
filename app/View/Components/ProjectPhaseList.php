<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
namespace App\View\Components;

use Illuminate\View\Component;

class ProjectPhaseList extends Component
{
    public $proyecto;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($proyecto)
    {
        $this->proyecto = $proyecto;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.project-phase-list');
    }
}