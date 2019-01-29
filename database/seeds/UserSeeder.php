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
    	$faker = Faker\Factory::create('fr_FR');

        $users = new User;
        $users->name = 'test';
        $users->email = 'test.test@gmail.com';
        $users->email_verified_at = $faker->dateTime($max = 'now', $timezone = null);
        $users->password = Hash::make('test');
        $users->role = 'user';
        $users->remember_token = null;
        $users->created_at = $faker->dateTime($max = 'now', $timezone = null);
        $users->updated_at = $faker->dateTime($max = 'now', $timezone = null);
        $users->save();

    	for($i = 0; $i < 100; $i++) 
    	{
    		$users = new User;
            $users->name = $faker->name;
            $users->email = $faker->email;
            $users->email_verified_at = $faker->dateTime($max = 'now', $timezone = null);
            $users->password = Hash::make($faker->password);
            $users->role = 'user';
            $users->remember_token = null;
            $users->created_at = $faker->dateTime($max = 'now', $timezone = null);
            $users->updated_at = $faker->dateTime($max = 'now', $timezone = null);
            $users->save();
    	}
	}
}