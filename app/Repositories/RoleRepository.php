<?php

namespace App\Repositories;

use App\Model\Role;

use App\Repositories\Contracts\RoleInterface;

class RoleRepository extends BaseRepository implements RoleInterface
{
    public function __construct(Role $role)
    {
        parent::__construct($role);
    }
}
