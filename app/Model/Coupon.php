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

    /**
     * @param $price
     */
    public function setPriceAttribute($price)
    {
        $this->attributes['price'] = $price && $price > 0 ? $price : 0;
    }

    /**
     * @param $percent
     */
    public function setPercentAttribute($percent)
    {
        $this->attributes['percent'] = $percent && $percent > 0 ? $percent : 0;
    }
}
