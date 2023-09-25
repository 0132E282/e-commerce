<?php

namespace App\View\Components\admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\View\Component;

class chartSales extends Component
{
    /**
     * Create a new component instance.
     */
    protected $dataSales;
    public function __construct($data)
    {
        $this->dataSales = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $tola = $this->dataSales->sum('tola');
        return view('components.admin.chart-sales', ['dataSales' => $this->dataSales, 'tola' => $tola]);
    }
}
