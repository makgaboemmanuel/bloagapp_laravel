<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*  user added code */
            DB::table('categories')->truncate();
        /* an array */

        DB::table('categories')->insert ( [
            [
                "title" =>  "Web Design"   ,
                "slug" => "web-design"   ,
                "created_at" => now()   ,
                "updated_at" => now()
            ],
            [
                "title" =>  "Web Programming"   ,
                "slug" => "web-programming"   ,
                "created_at" => now()   ,
                "updated_at" => now()
            ],

            [
                "title" =>  "Social Marketing"   ,
                "slug" => "social-marketing"   ,
                "created_at" => now()   ,
                "updated_at" => now()
            ],

            [
                "title" =>  "Internet"   ,
                "slug" => "internet"   ,
                "created_at" => now()   ,
                "updated_at" => now()
            ]
        ]);
    }
}
