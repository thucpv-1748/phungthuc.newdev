<?php

namespace App\Repositories;

use App\Model\TimeShow;

use App\Repositories\Contracts\TimeShowInterface;

class TimeShowRepository extends BaseRepository implements TimeShowInterface
{
    public function __construct(TimeShow $coupon)
    {
        parent::__construct($coupon);
    }
}
