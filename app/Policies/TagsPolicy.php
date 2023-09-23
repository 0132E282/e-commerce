<?php

namespace App\Policies;

use App\Models\User;
use App\Models\tags;
use Illuminate\Auth\Access\Response;

class TagsPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    protected $configTags;
    function __construct()
    {
        $this->configTags = config('permissions.access.tags.config');
    }
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, tags $tags): bool
    {
        $keyCode = $this->configTags['VIEW_TAGS']['key_code'];
        return $user->checkPermission($keyCode);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $keyCode = $this->configTags['CREATE_TAGS']['key_code'];
        return $user->checkPermission($keyCode);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, tags $tags): bool
    {
        $keyCode = $this->configTags['UPDATE_TAGS']['key_code'];
        return $user->checkPermission($keyCode);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, tags $tags): bool
    {
        $keyCode = $this->configTags['DELETE_TAGS']['key_code'];
        return $user->checkPermission($keyCode);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, tags $tags): bool
    {
        $keyCode = $this->configTags['RESTORE_TAGS']['key_code'];
        return $user->checkPermission($keyCode);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, tags $tags): bool
    {
        $keyCode = $this->configTags['DESTROY_TAGS']['key_code'];
        return $user->checkPermission($keyCode);
    }
}
