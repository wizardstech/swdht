<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class rolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'superadmin']);
        $role = Role::create(['name' => 'admin']);
        $role = Role::create(['name' => 'user']);
    }
}
