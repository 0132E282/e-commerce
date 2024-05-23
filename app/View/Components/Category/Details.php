<?php

namespace App\View\Components\Category;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Details extends Component
{
    /**
     * Create a new component instance.
     */
    public $categoryDetails;
    public function __construct($category = null)
    {
        $this->categoryDetails = $category;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.category.details', ['categoryDetails' => $this->categoryDetails]);
    }
}
