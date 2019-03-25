<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FastFood extends Model
{

    /**
     * @var bool
     */
    public $timestamps = false;
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'price',
    ];
}
