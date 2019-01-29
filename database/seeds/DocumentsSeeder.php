<?php

use Illuminate\Database\Seeder;

use App\Document;

class DocumentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        $documents = new Document;
        $documents->expense_id = 1;
        $documents->document = 'documents/TEST2.jpeg'; // Il faut créer une image TEST2.jpeg dans le storage/documents
        $documents->document_name = 'TEST2.png';
        $documents->created_at = $faker->dateTime($max = 'now', $timezone = null);
        $documents->updated_at = $faker->dateTime($max = 'now', $timezone = null);
        $documents->save();

    	for($i = 0; $i < 100; $i++) 
    	{
    		$documents = new Document;
            $documents->expense_id = $faker->numberBetween($min =1, $max = 100);
            $documents->document = 'documents/TEST1.jpeg';// Il faut créer une image TEST1.jpeg dans le storage/documents
            $documents->document_name = $faker->name();
            $documents->created_at = $faker->dateTime($max = 'now', $timezone = null);
            $documents->updated_at = $faker->dateTime($max = 'now', $timezone = null);
            $documents->save();
    	}
    }
}
