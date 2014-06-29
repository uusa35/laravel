<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class ArticlesTableSeeder extends Seeder {

	public function run()
	{
        DB::table('articles')->truncate();
		$faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Article::create([
                'title'=> $faker->sentence(1),
                'body'=> $faker->paragraph(5),
                'author'=> $faker->name(),
                'user_id' => $faker->numberBetween(1,6),
                'category_id'=>$faker->numberBetween(1,5),
                'created_at'=> $faker->dateTimeBetween('-1 day','+1 day'),
                'updated_at'=> $faker->dateTimeBetween('-1 day','+1 day'),
			]);
		}
	}

}