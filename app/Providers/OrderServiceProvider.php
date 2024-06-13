<?php

namespace App\Providers;

use App\Services\OrderStatus\OrderStatusFactory;
use Illuminate\Support\ServiceProvider;

class OrderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(OrderStatusFactory::class, function ($app) {
            return new OrderStatusFactory();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
