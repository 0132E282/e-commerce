<?php

namespace App\View\Components\product;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class card extends Component
{
    protected $dataProductItem;
    public function __construct($data)
    {
        $this->dataProductItem = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.product.card', ['productItem' => $this->dataProductItem]);
    }
}
