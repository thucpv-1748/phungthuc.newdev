<?php

namespace App\Repositories;

use App\Model\Store;

use App\Repositories\Contracts\StoreInterface;

class StoreRepository extends BaseRepository implements StoreInterface
{
    public function __construct(Store $store)
    {
        parent::__construct($store);
    }
}
