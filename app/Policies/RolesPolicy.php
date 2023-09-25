<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RolesPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    protected $configRole;
    function __construct()
    {
        $this->configRole = config('permissions.access.roles.config');
    }
    public function viewAny(User $user): bool
    {
        if (Auth::user()->email === 'admin01') {
            return true;
        }
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        $keyCode = $this->configRole['VIEW_ROLES']['key_code'];
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
        $keyCode = $this->configRole['CREATE_ROLES']['key_code'];
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
        $keyCode = $this->configRole['UPDATE_ROLES']['key_code'];
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
        $keyCode = $this->configRole['DELETE_ROLES']['key_code'];
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
        $keyCode = $this->configRole['RESTORE_ROLES']['key_code'];
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
        $keyCode = $this->configRole['DESTROY_ROLES']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }
    public function viewTrash(User $user): bool
    {
        $keyCode = $this->configRole['VIEW_TRASH_ROLES']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }
}
