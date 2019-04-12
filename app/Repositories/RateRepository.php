<?php

namespace App\Repositories;

use App\Model\Rate;
use App\Repositories\Contracts\RateInterface;
use Illuminate\Support\Facades\Auth;

class RateRepository extends BaseRepository implements RateInterface
{
    /**
     * RateRepository constructor.
     * @param Rate $rate
     */
    public function __construct(Rate $rate)
    {
        parent::__construct($rate);
    }

    /**
     * @param $input
     */

    public function CreateRate($input)
    {
        $data = $input->only('film_id', 'rate');
        $data['user_id'] = Auth::user()->id;
        $model = $this->model->where('film_id', $input->film_id)->where('user_id', $data['user_id'])->first();
        if ($model) {
            $this->update($model->id, $data);
        } else {
            $this->create($data);
        }
    }
}
