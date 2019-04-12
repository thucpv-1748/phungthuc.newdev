<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class Rate extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'rate',
        'film_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function film()
    {
        return $this->belongsTo('App\Model\Film', 'film_id');
    }

    /**
     * @param $id
     * @return mixed
     */

    public function countRate($id)
    {
       $data = DB::select(DB::raw('SELECT SUM(rate)/COUNT(id) as `rate` FROM `rates` WHERE `film_id` = ' . $id));
       if ($data[0]->rate) {
            return $data[0]->rate;
       } else {
           return 0;
       }
    }
}
