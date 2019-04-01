<?php

namespace App\Repositories;

use App\User;
use App\Model\Role;
use App\Repositories\Contracts\UserInterface;

class UserRepository extends BaseRepository implements UserInterface
{
    /**
     * UserRepository constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    /**
     * @param $input
     * @return mixed
     */
    public function createUser($input)
    {
        $data = $this->model->create($input->only('email', 'password', 'name', 'phone', 'date_of_birth'));
        if ($input->role) {
            $data->roles()->attach(Role::findOrFail($input->role));
        } else {
            $role = Role::where('name', 'user')->first();
            $data->roles()->attach(Role::findOrFail($role->id));
        }

        return $data;
    }

    /**
     * @param $input
     * @return mixed
     */
    public function updateUser($input)
    {
        if ($this->updatePassword($input)) {
            $data = $this->update($input->id, $input->only('email', 'password', 'name', 'phone', 'date_of_birth'));
        } else {
            $data = $this->update($input->id, $input->only('email', 'name', 'phone', 'date_of_birth'));
        }
        $data->roles()->sync($input->role);

        return $data;
    }

    /**
     * @param $input
     * @return bool
     */
    public function updatePassword($input)
    {
        $model = $this->model->findOrFail($input->id);
        $currentpassword = $model->password;
        $newpassword = $input->password;
        if ($currentpassword === $newpassword) {
            return false;
        } else {
            return true;
        }
    }
}
