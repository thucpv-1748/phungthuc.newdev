<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Model\Role;

class addAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_manager  = Role::where('name', 'admin')->first();

        $manager = new User();
        $manager->name = 'Admin Name';
        $manager->email = 'admin@gmail.com';
        $manager->password = bcrypt('admin123');
        $manager->save();
        $manager->roles()->attach($role_manager);
    }
}
