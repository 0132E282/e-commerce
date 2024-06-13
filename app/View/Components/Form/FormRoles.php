<?php

namespace App\View\Components\Form;

use App\Models\Permissions;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormRoles extends Component
{
    protected $modelPermission;
    protected $role;
    public function __construct($role = null)
    {
        $this->modelPermission = new Permissions();
        $this->role = $role;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $permissions = $this->modelPermission->whereNull('parent_id')->with('children')->get();

        return view('components/form/form-roles', ['permissions' => $permissions, 'role' => $this->role]);
    }
}
