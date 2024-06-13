<?php

namespace App\Policies;

use App\Models\User;
use App\Models\slider;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class SliderPolicy
{
    protected $configSlider;
    function __construct()
    {
        $this->configSlider = config('permissions.access.slider.config');
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
        $keyCode = $this->configSlider['VIEW_SLIDER']['key_code'];
        if (Auth::user()->email === env('APP_USERNAME') || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $keyCode = $this->configSlider['CREATE_SLIDER']['key_code'];
        if (Auth::user()->email === env('APP_USERNAME') || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user): bool
    {
        $keyCode = $this->configSlider['UPDATE_SLIDER']['key_code'];
        if (Auth::user()->email === env('APP_USERNAME') || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user): bool
    {
        $keyCode = $this->configSlider['DELETE_SLIDER']['key_code'];
        if (Auth::user()->email === env('APP_USERNAME') || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user): bool
    {
        $keyCode = $this->configSlider['RESTORE_SLIDER']['key_code'];
        if (Auth::user()->email === env('APP_USERNAME') || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user): bool
    {
        $keyCode = $this->configSlider['DESTROY_SLIDER']['key_code'];
        if (Auth::user()->email === env('APP_USERNAME') || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }
    public function viewTrash(User $user): bool
    {
        $keyCode = $this->configSlider['VIEW_TRASH_SLIDER']['key_code'];
        if (Auth::user()->email === env('APP_USERNAME') || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }
}
