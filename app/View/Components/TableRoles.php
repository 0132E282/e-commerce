<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableRoles extends Component
{
    protected $dataTable;
    public function __construct($data)
    {
        $this->dataTable = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components/table/table-roles', ['dataTable' => $this->dataTable]);
    }
}
