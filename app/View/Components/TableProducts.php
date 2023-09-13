<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableProducts extends Component
{
    /**
     * Create a new component instance.
     */
    public $dataTable;
    public function __construct($data)
    {
        $this->dataTable = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components/table/table-products');
    }
}
