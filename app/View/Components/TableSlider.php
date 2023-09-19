<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableSlider extends Component
{
    public $dataTable;
    public function __construct($data = [])
    {
        $this->dataTable = $data;
    }
    public function render(): View|Closure|string
    {
        return view('components/table/table-slider');
    }
}
