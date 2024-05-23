<?php

namespace App\View\Components\form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormBrands extends Component
{
    /**
     * Create a new component instance.
     */
    protected $brand;
    public function __construct($brand = null)
    {
        $this->brand = $brand;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.form-brands', ['brand' => $this->brand]);
    }
}
