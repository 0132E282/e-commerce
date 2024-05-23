<?php

namespace App\View\Components\Product;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableCreateAttr extends Component
{
    /**
     * Create a new component instance.
     */
    protected $variations;
    public function __construct($variations = null)
    {
        $this->variations = $variations;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product.table-create-attr', ['variants' => $this->variations]);
    }
}
