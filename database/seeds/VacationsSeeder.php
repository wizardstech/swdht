<?php

use Illuminate\Database\Seeder;

use App\Vacation;

class VacationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        $vacation = new Vacation;
        $vacation->user_id = 1;
        $vacation->start_date = $faker->dateTime($max = 'now', $timezone = null);;
        $vacation->return_date = $faker->dateTime($max = 'now', $timezone = null);
        $vacation->status = 'En attente';
        $vacation->type = 'RTT';
        $vacation->created_at = $faker->dateTime($max = 'now', $timezone = null);
        $vacation->updated_at = $faker->dateTime($max = 'now', $timezone = null);
        $vacation->save();

    	for($i = 0; $i < 100; $i++) 
    	{
    		$vacation = new Vacation;
            $vacation->user_id = $faker->numberBetween($min =1, $max = 100);
            $vacation->start_date = $faker->dateTime($max = 'now', $timezone = null);
            $vacation->return_date = $faker->dateTime($max = 'now', $timezone = null);
            $vacation->status = 'En attente';
            $vacation->type = 'RTT';
            $vacation->created_at = $faker->dateTime($max = 'now', $timezone = null);
            $vacation->updated_at = $faker->dateTime($max = 'now', $timezone = null);
            $vacation->save();
    	}
    }
}
