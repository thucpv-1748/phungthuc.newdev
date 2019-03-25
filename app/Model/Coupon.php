<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'coupon_code',
        'status',
        'type',
        'price',
        'percent',
    ];
}
