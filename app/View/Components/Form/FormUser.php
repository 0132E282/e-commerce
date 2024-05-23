<?php

namespace App\View\Components\Form;

use App\Models\Roles;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormUser extends Component
{
    public $user;
    public function __construct($user = null)
    {
        $this->user = $user;
    }

    public function render(): View|Closure|string
    {
        $roles = Roles::all();
        return view('components.form.form-user', ['user' => $this->user, 'roles' => $roles]);
    }
}
