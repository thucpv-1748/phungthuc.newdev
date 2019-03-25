<?php

namespace App\Repositories;

use App\Model\Room;

use App\Repositories\Contracts\RoomInterface;

class RoomRepository extends BaseRepository implements RoomInterface
{
    public function __construct(Room $room)
    {
        parent::__construct($room);
    }
}
