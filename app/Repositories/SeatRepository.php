<?php

namespace App\Repositories;

use App\Model\Seat;

use App\Repositories\Contracts\SeatInterface;

class SeatRepository extends BaseRepository implements SeatInterface
{
    public function __construct(Seat $seat)
    {
        parent::__construct($seat);
    }
}
