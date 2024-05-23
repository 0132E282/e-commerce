<?php

namespace App\View\Components\table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tableBrands extends Component
{
    /**
     * Create a new component instance.
     */
    protected  $brands;
    public function __construct($brands)
    {
        $this->brands  = $brands;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.table-brands', ['brands' => $this->brands]);
    }
}
