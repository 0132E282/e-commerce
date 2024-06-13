<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminPolicy
{
    /**
     * Create a new policy instance.
     */
    protected $configBrands;
    public function __construct()
    {
        $this->configBrands = config('permissions.access.admin.config');
    }
    public function view(User $user): bool
    {
        $keyCode = $this->configBrands['VIEW_ADMIN']['key_code'];
        if (Auth::user()->email === env('APP_USERNAME') || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }
}
