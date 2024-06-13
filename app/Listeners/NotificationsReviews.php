<?php

namespace App\Listeners;

use App\Events\CreateReviewsEvent;
use App\Models\User;
use App\Notifications\AdminReviewsNotifications;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotificationsReviews
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(CreateReviewsEvent $event): void
    {
        $users = User::whereHas('roles.permissions', function ($permission) {
            $permission->where('name', 'VIEW_REVIEWS');
        })->orWhere('email', '=', env("APP_USERNAME"))->get();
        $users->each(function ($user) use ($event) {
            $user->notify(new AdminReviewsNotifications(
                $event->reviews,
                'Đánh giá bài viết',
                'Bạn có một bài đánh giá trông sản phẩm ' . $event->reviews->product->name
            ));
        });
    }
}
