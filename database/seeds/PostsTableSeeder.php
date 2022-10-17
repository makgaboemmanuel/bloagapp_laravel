<?php

use Illuminate\Database\Seeder;

/*  user added library  */
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*   user added code  */

        /* delete all records in table and reset the counter */
            DB::table('posts')->truncate();
        /*  delete all records in table and reset the counter */

        /* id	author_id	title	slug	excerpt	body	image	created_at	updated_at  */

        $faker = Faker::create();
        $arr = range(1,50);
        $posts = [];

        foreach($arr as $index){

            $image = 'Post_Image_' . rand(1, 10) . ".jpg";


            $posts[] = [
            'author_id' => rand(1,5),
            'title' => $faker->sentence( rand(8, 12) ),
            'slug' => $faker->slug(),
            'excerpt' => $faker->text( rand(60, 250) ),
            'body' => $faker->sentence( rand(10, 25), true ),
            'image' => rand(0, 1) == 0 ? null : $image,
            'category_id' => rand(1, 4),
            'created_at' => now(),
            'updated_at' => now(),
            'published_at' => now()
            ];
        }

        /* inserting into the database */
        DB::table('posts')->insert($posts);
    }
}
