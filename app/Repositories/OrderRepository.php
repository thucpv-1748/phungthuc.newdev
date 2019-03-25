<?php

namespace App\Repositories;

use App\Model\Order;

use App\Repositories\Contracts\OrderInterface;

class OrderRepository extends BaseRepository implements OrderInterface
{
    public function __construct(Order $order)
    {
        parent::__construct($order);
    }
}
