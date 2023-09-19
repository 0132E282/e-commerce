<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component
{
    protected $columnNames = [];
    protected $dataTable;
    public function __construct($columnNames,  $dataTable)
    {
        $this->columnNames = $columnNames;
        $this->dataTable = $dataTable;
    }
    public function render(): View|Closure|string
    {
        return view('components/table/index', ['dataTable' => $this->dataTable, 'columnNames' => $this->columnNames]);
    }
}
