<?php

namespace App\View\Components\table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableOrder extends Component
{
    /**
     * Create a new component instance.
     */
    protected $dataBillList;
    public function __construct($data)
    {
        $this->dataBillList = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.table-order', ['billList' => $this->dataBillList]);
    }
}
