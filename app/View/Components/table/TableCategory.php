<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableCategory extends Component
{
    /**
     * Create a new component instance.
     */
    protected $categoryList;
    public function __construct($categoryList)
    {
        $this->categoryList = $categoryList;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.table-category', ['categoryList' => $this->categoryList]);
    }
}
