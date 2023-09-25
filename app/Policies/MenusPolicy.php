<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MenusPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    protected $configProduct;
    function __construct()
    {
        $this->configProduct = config('permissions.access.menus.config');
    }
    public function viewAny(User $user): bool
    {
        $keyCode = $this->configProduct['VIEW_MENUS']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        $keyCode = $this->configProduct['VIEW_MENUS']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }

    public function viewTrash(User $user): bool
    {
        $keyCode = $this->configProduct['VIEW_MENUS']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $keyCode = $this->configProduct['CREATE_MENUS']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        $keyCode = $this->configProduct['UPDATE_MENUS']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        $keyCode = $this->configProduct['DELETE_MENUS']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user): bool
    {
        $keyCode = $this->configProduct['RESTORE_MENUS']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): bool
    {
        $keyCode = $this->configProduct['DESTROY_MENUS']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }
}
