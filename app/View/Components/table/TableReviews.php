<?php

namespace App\View\Components\table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableReviews extends Component
{
    /**
     * Create a new component instance.
     */
    protected $reviews;
    public function __construct($reviews)
    {
        $this->reviews = $reviews;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.table-reviews', ['reviews' => $this->reviews]);
    }
}
