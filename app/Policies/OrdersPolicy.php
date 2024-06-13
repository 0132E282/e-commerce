<?php

namespace App\Policies;

use App\Models\Orders;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class OrdersPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    protected $configOrders;

    function __construct()
    {
        $this->configOrders = config('permissions.access.orders.config');
    }
    public function viewAny(User $user): bool
    {
        if (Auth::user()->email ===  env('APP_USERNAME')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user): bool
    {
        $keyCode =  $this->configOrders['VIEW_ORDERS']['key_code'];
        if (Auth::user()->email ===  env('APP_USERNAME') ||  $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        if (Auth::user()->email ===  env('APP_USERNAME')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Orders $orders): bool
    {
        if (Auth::user()->email ===  env('APP_USERNAME')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Orders $orders): bool
    {
        if (Auth::user()->email ===  env('APP_USERNAME')) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Orders $orders): bool
    {
        $keyCode = $this->configOrders['VIEW_MENUS']['key_code'];
        if (Auth::user()->email ===  env('APP_USERNAME') || $user->checkPermission($keyCode)) {
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Orders $orders): bool
    {
        if (Auth::user()->email ===  env('APP_USERNAME')) {
            return true;
        }
        return false;
    }
}
