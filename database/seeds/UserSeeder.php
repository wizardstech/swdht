<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => 'admin@swdht.io',
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'birthdate' => date('Y-m-d'),
            'password' => bcrypt('admin'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        $user = User::where('username', 'admin')->first();
        $user->assignRole('superadmin');
    }
}
