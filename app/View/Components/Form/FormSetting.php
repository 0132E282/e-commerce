<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormSetting extends Component
{
    /**
     * Create a new component instance.
     */
    protected $settingSystem;
    public function __construct($settingSystem)
    {
        $this->settingSystem = $settingSystem;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components/form/form-setting', ['settingSystem' => $this->settingSystem]);
    }
}
