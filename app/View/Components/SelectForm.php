<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectForm extends Component
{
    public $dataSelect;
    public $multiple;
    public function __construct($dataSelect = [])
    {
        $this->dataSelect = $dataSelect ?? [];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components/select/select');
    }
}
