<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableSlider extends Component
{
    /**
     * Create a new component instance.
     */
    protected $sliders;
    public function __construct($sliders)
    {
        $this->sliders = $sliders;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.table-slider', ['sliders' =>  $this->sliders]);
    }
}
