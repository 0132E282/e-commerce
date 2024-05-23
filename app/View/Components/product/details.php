<?php

namespace App\View\Components\Product;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class details extends Component
{
    /**
     * Create a new component instance.
     */
    protected $product;
    public function __construct($product = null)
    {
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product.details', ['product' => $this->product]);
    }
}
