<?php

namespace App\Repository\RepositoryMain;

use App\Models\Orders;
use App\Repository\RepositoriesInterface\OrdersRepositoryInterface;
use App\Repository\RepositoryMain\BaseRepository;
use Carbon\Carbon;

class OrdersRepository extends BaseRepository implements OrdersRepositoryInterface
{
    protected object $orderModal;
    function __construct()
    {
        $this->orderModal = new Orders();
    }
    function create($value, $options = [])
    {
    }
    function update($id, $value, $options = [])
    {
    }
    function delete($id, $options = [])
    {
        $order = $this->orderModal->find($id);
        if ($order->status == 1 || isset($order->paid_at)) throw new \Exception('đơn hàng của bận đã được xát nhận bạn không thể xóa');
        return  $order->delete();
    }
    function details($id, $option = null)
    {
        return $this->orderModal->find($id);
    }
    function all($options = null)
    {
        $orders = $this->orderModal
            ->search($options['search'] ?? null)
            ->filter($options)
            ->orderBy($options['order'] ?? 'created_at', $options['by'] ?? 'DESC');
        return  $orders;
    }
    function trash()
    {
        return $this->orderModal->onlyTrashed();
    }
    function restore($id)
    {
        $order = $this->orderModal->onlyTrashed()->where('id', $id);
        return  $order->restore();
    }
    function destroy($id)
    {
        $order = $this->orderModal->onlyTrashed()->where('id', $id);
        $order->forceDelete();
        return $order;
    }
    function statistical($timeOption = null)
    {
        switch ($timeOption) {
            case 'yesterday':
                $time = Carbon::now()->subDay(1)->startOfDay();
                $format =  '"%H:00:00"';
                break;
            case 'last_7_days':
                $time = Carbon::now()->subDay(7)->startOfDay();
                $format =  '"%d"';
                break;
            case 'last_30_days':
                $time = Carbon::now()->subDay(30)->startOfDay();
                $format =  '"%d"';
                break;
            case 'last_1_year':
                $time = Carbon::now()->subDay(30)->startOfDay();
                $format =  '"%d"';
                break;
            default:
                $time = Carbon::now()->startOfDay();
                $format =  '"%H:00:00"';
        }
        $order =  $this->orderModal->select('*')->selectRaw('DATE_FORMAT(created_at, ' . $format . ') as time')->whereBetween('created_at', [$time, Carbon::now()->endOfDay()])->get()->groupBy('time');
        $statistical = $order->transform(function ($order) {
            $totalPrice = $order->sum(function ($order) {
                return $order->order_items->sum(function ($item) {
                    return  $item->quantity * $item->price;
                });
            });
            return [
                'quantity' => $order->count(),
                'price' => $totalPrice,
                'average' => $totalPrice  / $order->count()
            ];
        });
        return $statistical;
    }
}
