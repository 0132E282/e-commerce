<?php

namespace App\View\Components;

use App\Models\Roles;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormUser extends Component
{
    protected $modelRoles;
    public $dataUser;
    public function __construct($data = null)
    {
        $this->dataUser = $data;
        $this->modelRoles = new Roles();
    }

    public function render(): View|Closure|string
    {

        $roles = $this->modelRoles->all();
        if (isset($this->dataUser->roles)) {
            foreach ($roles as $role) {
                foreach ($this->dataUser->roles as $role_user) {
                    if ($role->id == $role_user->id) {
                        $role->checked = true;
                    }
                }
            }
        }
        return view('components/form/form-user', ['roles' => $roles]);
    }
}
