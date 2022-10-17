<?php

use Illuminate\Database\Seeder;

/* include the Faker Library */
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
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
            DB::table('users')->truncate();
        /*  delete all records in table and reset the counter */

        $faker = Faker::create();
        $arr = range(1,5);
        $users = [];

        /*   columns: id	name	email	email_verified_at	password	remember_token	created_at	updated_at   */

        foreach($arr as $index){
            $users[] = [
                'name' => $faker->firstName(),
                'email' => $faker->unique()->email(), // $faker->email,
                'email_verified_at' => now(),
                'password' => bcrypt('password'),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        /* inserting into the database */
        DB::table('users')->insert($users);
    }
}
