<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'category';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function getFilm()
    {
        return $this->hasMany('App\model\ListFilm');
    }
}
