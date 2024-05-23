<?php

namespace App\Repository\RepositoryMain;

use App\Models\Orders;
use App\Repository\RepositoriesInterface\OrdersRepositoryInterface;
use App\Repository\RepositoryMain\BaseRepository;

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
}
