<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CommentsTableSeeder extends Seeder {

	public function run()
	{
        //truncate before seeding
        DB::table('comments')->truncate();		

        $faker = Faker::create();

		foreach(range(1, 10) as $index)
		{
			Comment::create([
                'content' => $faker->sentence,
                'author_name' => $faker->name,
                'post_id' => $index
			]);
            
            
		}
        
        
	}

}
