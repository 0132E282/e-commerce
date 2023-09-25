<?php

namespace App\Policies;

use App\Models\User;
use App\Models\users;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class UsersPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    protected $configUser;
    function __construct()
    {
        $this->configUser = config('permissions.access.user.config');
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
        $keyCode = $this->configUser['VIEW_USER']['key_code'];
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
        $keyCode = $this->configUser['CREATE_USER']['key_code'];
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
        $keyCode = $this->configUser['UPDATE_USER']['key_code'];
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
        $keyCode = $this->configUser['DELETE_USER']['key_code'];
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
        $keyCode = $this->configUser['RESTORE_USER']['key_code'];
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
        $keyCode = $this->configUser['DESTROY_USER']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }
    public function admin(User $user): bool
    {
        if (Auth::user()->roles) {
            return true;
        }
    }
    public function viewTrash(User $user): bool
    {
        $keyCode = $this->configUser['VIEW_TRASH_USER']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }
}
