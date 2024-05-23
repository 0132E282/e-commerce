<?php

namespace App\View\Components\Form;

use App\Models\Permissions;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class FormPermission extends Component
{
    /**
     * Create a new component instance.
     */
    protected $models;
    public function __construct($data = null)
    {
        $this->models = config('permissions.access');
    }
    /**
     * Get the view / contents that represent the component.
     */

    public function render(): View|Closure|string
    {
        $permissions = Permissions::all()->whereNull('parent_id');
        return view('components/form/form-permission', ['models' =>  $this->models, 'permissions' => $permissions]);
    }
}
