<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Permissions;
use App\Models\User;
use App\Policies\ProductPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $configAccess = config('permissions.access');
        foreach ($configAccess as $key => $value) {
            foreach ($value['config'] as $permission) {
                Gate::define($permission['name'], [$value['policy'], $permission['action']]);
            }
        }
    }
}
