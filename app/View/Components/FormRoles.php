<?php

namespace App\View\Components;

use App\Models\Permissions;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormRoles extends Component
{
    protected $modelPermission;
    protected $dataForm;
    public function __construct($data = null)
    {
        $this->modelPermission = new Permissions();
        $this->dataForm = $data;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $permission = $this->modelPermission->where('parent_id', '=', 0)->get();

        return view('components/form/form-roles', ['permission' => $permission, 'dataForm' => $this->dataForm]);
    }
}
