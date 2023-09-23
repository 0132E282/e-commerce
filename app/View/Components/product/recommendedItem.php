<?php

namespace App\View\Components\product;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class recommendedItem extends Component
{
    /**
     * Create a new component instance.
     */
    protected $recommendedProduct;
    public function __construct($data)
    {
        $this->recommendedProduct = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product.recommended-item', ['recommendedProduct' => $this->recommendedProduct]);
    }
}
