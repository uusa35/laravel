<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class Articles_categoriesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();
        DB::table('articles_categories')->truncate();
		foreach(range(1, 10) as $index)
		{
			Articles_category::create([
                'categoriy_id' => $faker->randomElement(['news','economic','political','sports'])
			]);
		}
	}

}