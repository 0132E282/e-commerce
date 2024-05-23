<?php

namespace App\View\Components\Breadcrumb;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BreadcrumbAdmin extends Component
{
    /**
     * Create a new component instance.
     */
    public $breadcrumbName = [];
    public $value = [];
    public function __construct($value = null)
    {
        $this->value = $value;
    }
    public function render(): View|Closure|string
    {
        return view('components/breadcrumb-admin');
    }
}
