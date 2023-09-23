<?php

namespace App\View\Components;

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
    protected $permissionsList = [];
    protected $modelPermissions;
    protected $permissions;
    protected $modules;
    public function __construct($data = null)
    {
        $this->permissions = $data;
        $this->modelPermissions = new Permissions();
        $this->modules = config('permissions.modules');
    }
    /**
     * Get the view / contents that represent the component.
     */
    function filterPermissions()
    {
        if ($this->permissions) {
            foreach ($this->modules['permissions'] as $key => $permission) {
                if ($this->permissions->permissionsChildren->contains('key_code', $permission['value'] . '_' . $this->permissions->name)) {
                    $permission['checked'] = true;
                    $this->modules['permissions'][$key]['checked'] = true;
                }
            }
        } else {
            $permissionList = $this->modelPermissions->where('parent_id', 0)->get();
            foreach ($this->modules['table'] as $key => $table) {
                foreach ($permissionList as $itemPermission) {
                    if ($table['value'] == $itemPermission->name) {
                        unset($this->modules['table'][$key]);
                    }
                }
            }
        }
        return $this->modules;
    }
    public function render(): View|Closure|string
    {
        $modulesData = $this->filterPermissions();
        return view('components/form/form-permission', ['permissionsList' =>   $modulesData['permissions'], 'tableModule' =>  $modulesData['table'], 'permissions' => $this->permissions]);
    }
}
