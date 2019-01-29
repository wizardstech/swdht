<?php

use Illuminate\Database\Seeder;

use App\ExpenseReport;

class ExpenseReportsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$faker = Faker\Factory::create('fr_FR');

        $expense_reports = new ExpenseReport;
        $expense_reports->user_id = 1;
        $expense_reports->amount = 42;
        $expense_reports->date_expense = $faker->dateTime($max = 'now', $timezone = null);
        $expense_reports->provider = 'Wizards Techonologies';
        $expense_reports->details = 'Nerfs forever';
        $expense_reports->state = 'En attente';
        $expense_reports->created_at = $faker->dateTime($max = 'now', $timezone = null);
        $expense_reports->updated_at = $faker->dateTime($max = 'now', $timezone = null);
        $expense_reports->save();

    	for($i = 0; $i < 100; $i++) 
    	{
    		$expense_reports = new ExpenseReport;
            $expense_reports->user_id = $faker->numberBetween($min =1, $max = 100);
            $expense_reports->amount = $faker->numberBetween($min = 10, $max = 200);
            $expense_reports->date_expense = $faker->dateTime($max = 'now', $timezone = null);
            $expense_reports->provider = $faker->company;
            $expense_reports->details = $faker->text($maxNbChars = 100);
            $expense_reports->state = 'En attente';
            $expense_reports->created_at = $faker->dateTime($max = 'now', $timezone = null);
            $expense_reports->updated_at = $faker->dateTime($max = 'now', $timezone = null);
            $expense_reports->save();
    	}
	}
}