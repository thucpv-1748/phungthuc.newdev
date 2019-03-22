<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * @var string
     */
    protected $table = 'orders';
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function timeShow()
    {
        return $this->belongsTo('App\Model\TimeShow','time_show_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function coupon()
    {
        return $this->belongsTo('App\Model\Coupon','coupon_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fastFood()
    {
        return $this->hasMany('App\Model\FastFood','fast_food_ids');
    }
}
