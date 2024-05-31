<?php

namespace App\Policies;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class SettingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    protected $configSetting;
    function __construct()
    {
        $this->configSetting = config('permissions.access.setting.config');
    }
    public function viewAny(User $user): bool
    {
        $keyCode = $this->configSetting['VIEW_ANY_SETTING']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }
    public function payment(User $user): bool
    {
        $keyCode = $this->configSetting['PAYMENT_SETTING']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }
    function system(User $user)
    {
        $keyCode = $this->configSetting['SYSTEM_SETTING']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }
    public function permissions(User $user): bool
    {
        $keyCode = $this->configSetting['PERMISSIONS_SETTING']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function contact(User $user): bool
    {
        $keyCode = $this->configSetting['CONTACT_SETTING']['key_code'];
        if (Auth::user()->email === 'admin01@admin.com' || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }
}
