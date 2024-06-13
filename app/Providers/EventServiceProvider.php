<?php

namespace App\Providers;

use App\Events\CreateReviews;
use App\Events\CreateReviewsEvent;
use App\Events\OrdersProcessed;
use App\Listeners\NotificationsOrder;
use App\Listeners\NotificationsReviews;
use App\Listeners\UpdateStatusOrder;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        OrdersProcessed::class => [
            UpdateStatusOrder::class,
            NotificationsOrder::class
        ],
        CreateReviewsEvent::class => [
            NotificationsReviews::class
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
