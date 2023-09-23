<?php

namespace App\View\Components\home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FeaturesItem extends Component
{
    /**
     * Create a new component instance.
     */
    protected $dataProductList;
    public function __construct($data)
    {
        $this->dataProductList = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.home.features-item', ['dataProductList' => $this->dataProductList]);
    }
}
