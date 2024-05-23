<?php

namespace App\View\Components\Category;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select extends Component
{
    /**
     * Create a new component instance.
     */
    public $categoryList;
    public function __construct($categoryList)
    {
        $this->categoryList = $categoryList;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category.select', ['categoryList' => $this->categoryList]);
    }
}
