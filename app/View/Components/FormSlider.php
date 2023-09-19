<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormSlider extends Component
{
    /**
     * Create a new component instance.
     */
    public $sliderDetails;
    public function __construct($data = null)
    {
        $this->sliderDetails = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components/form/form-slider');
    }
}
