<?php

namespace App\Repositories;

use App\Model\FastFood;

use App\Repositories\Contracts\FastFoodInterface;

class FastFoodRepository extends BaseRepository implements FastFoodInterface
{
    public function __construct(FastFood $fastFood)
    {
        parent::__construct($fastFood);
    }
}
