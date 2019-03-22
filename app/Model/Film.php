<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    //
    /**
     * @var bool
     */
    public $timestamps = false;


    /**
     * @var string
     */
    protected $table = 'films';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Model\Category','category_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function timeShow()
    {
        return $this->hasMany('App\Model\TimeShow');
    }

}
