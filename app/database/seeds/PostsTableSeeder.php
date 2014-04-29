<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder {

	public function run()
	{
		//truncate before seeding
        DB::table('posts')->truncate();

        $faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Post::create([
                'title' => $faker->sentence,
                'content' => $faker->text,
                'author_name' => $faker->name,
             
			]);
		}
	}

}
