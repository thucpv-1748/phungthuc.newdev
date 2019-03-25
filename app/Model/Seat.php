<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
        'row',
        'col',
        'room_id',
    ];
}
