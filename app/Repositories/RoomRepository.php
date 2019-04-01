<?php

namespace App\Repositories;

use App\Model\Room;
use App\Repositories\Contracts\RoomInterface;
use App\Repositories\Contracts\SeatInterface;

class RoomRepository extends BaseRepository implements RoomInterface
{
    /**
     * @var SeatInterface
     */
    public $seat;

    /**
     * RoomRepository constructor.
     * @param Room $room
     * @param SeatInterface $seat
     */
    public function __construct(Room $room, SeatInterface $seat)
    {
        parent::__construct($room);
        $this->seat = $seat;
    }

    /**
     * @param $input
     * @return mixed
     */
    public function createRoom($input)
    {
        $data = $this->model->create($input->all());
        $this->saveSeatByRoom($data->id, $input->row);

        return $data;
    }

    /**
     * @param $input
     * @return mixed
     */
    public function updateRoom($input)
    {
        $data = $this->update($input->id, $input->all());
        $this->saveSeatByRoom($data->id, $input->row);

        return $data;
    }

    /**
     * @param $roomid
     * @param $input
     */
    public function saveSeatByRoom($roomid, $input)
    {
        $this->seat->where('room_id', $roomid)->delete();
        if ($input) {
            foreach ($input as $key => $value) {
                $data = [
                    'row' => $key,
                    'col' => $value,
                    'room_id' => $roomid,
                ];
                $this->seat->create($data);
            }
        }
    }
}
