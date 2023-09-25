<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class CategoryPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    protected $configCategory;
    function __construct()
    {
        $this->configCategory = config('permissions.access.category.config');
    }
    public function viewAny(User $user): bool
    {
        if (Auth::user()->email === 'admin01@admin.com') {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        $keyCode = $this->configCategory['VIEW_CATEGORY']['key_code'];
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
        $keyCode = $this->configCategory['CREATE_CATEGORY']['key_code'];
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
        $keyCode = $this->configCategory['UPDATE_CATEGORY']['key_code'];
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
        $keyCode = $this->configCategory['DELETE_CATEGORY']['key_code'];
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
        $keyCode = $this->configCategory['RESTORE_CATEGORY']['key_code'];
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
        $keyCode = $this->configCategory['DESTROY_CATEGORY']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }
    public function viewTrash(User $user): bool
    {
        $keyCode = $this->configCategory['VIEW_TRASH_CATEGORY']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }
}
