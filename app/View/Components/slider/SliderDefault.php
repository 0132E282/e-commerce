<?php

namespace App\View\Components\slider;

use App\Models\Sliders;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SliderDefault extends Component
{
    /**
     * Create a new component instance.
     */
    protected $modelSlider;
    public function __construct()
    {
        $this->modelSlider = new Sliders();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $slider = $this->modelSlider->latest()->get();
        return view('components.slider.slider-default', ['slider' => $slider]);
    }
}
