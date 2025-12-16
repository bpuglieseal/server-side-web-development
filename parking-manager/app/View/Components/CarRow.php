<?php

namespace App\View\Components;

use App;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CarRow extends Component
{
    public $car;

    /**
     * Create a new component instance.
     */
    public function __construct(App\Models\Car $car)
    {
        $this->car = $car;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.car-row');
    }
}
