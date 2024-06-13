<?php

namespace App\Listeners;

use App\Events\OrdersProcessed;
use Carbon\Carbon;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateStatusOrder
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
        $request = $event->request;
        if (isset($request->vnp_ResponseCode) && $request->vnp_ResponseCode != 00 ||  isset($request->resultCode) != null && $request->resultCode != 0) {
            $event->order->update(['status' => 0]);
            throw new Exception('đơn hàng đã bị hủy bỏ do chưa thanh toán');
        }
        if (isset($request->responseTime) || isset($request->vnp_PayDate)) {
            $data = Carbon::createFromTimestamp(($request->responseTime ?? $request->vnp_PayDate) / 1000);
            $event->order->update(['paid_at' => $data]);
        }
    }
}
