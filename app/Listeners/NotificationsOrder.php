<?php

namespace App\Listeners;

use App\Events\OrdersProcessed;
use App\Jobs\SendMailJob;
use App\Mail\ConcatMail;
use App\Models\User;
use App\Notifications\InvoicePaid;
use Carbon\Carbon;

class NotificationsOrder
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
    public function handle(OrdersProcessed $event): void
    {
        SendMailJob::dispatch($event->order->email, new ConcatMail($event->order))->delay(Carbon::now()->addMinutes(2));
        $users = User::whereHas('roles.permissions', function ($permission) {
            $permission->where('name', 'VIEW_ORDERS');
        })->orWhere('email', '=', env("APP_USERNAME"))->get();
        $users->each(function ($user) use ($event) {
            $user->notify(new InvoicePaid($event->order, 'có đơn hàng mới', 'đơn hàng cần cần xát nhận #' . $event->order->trading_code));
        });
    }
}
