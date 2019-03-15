<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{



    /**
     * @var string
     */
    protected $table = 'roles';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
