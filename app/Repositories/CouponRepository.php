<?php

namespace App\Repositories;

use App\Model\Coupon;

use App\Repositories\Contracts\CouponInterface;

class CouponRepository extends BaseRepository implements CouponInterface
{
    public function __construct(Coupon $coupon)
    {
        parent::__construct($coupon);
    }
}
