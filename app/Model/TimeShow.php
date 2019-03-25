<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TimeShow extends Model
{
    /**
     * @var string
     */
    protected $table = 'time_shows';
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'film_id',
        'room_id',
        'status',
        'time_show',
        'price',
        'sale_price',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function film()
    {
        return $this->belongsTo('App\Model\Film', 'film_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function room()
    {
        return $this->belongsTo('App\Model\Room', 'room_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order()
    {
        return $this->hasMany('App\Model\Order', 'time_show_id');
    }
}
