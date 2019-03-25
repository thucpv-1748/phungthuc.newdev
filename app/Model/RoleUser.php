<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    /**
     * @var string
     */
    protected $table = 'role_user';

    /**
     * @var array
     */
    protected $fillable = [
        'role_id',
        'user_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo('App\Model\Role', 'role_id');
    }
}
