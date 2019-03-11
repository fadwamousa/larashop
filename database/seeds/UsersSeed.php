<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$faker = \Faker\Factory::create();
    	$password = Hash::make('toptal');
    	User::create([
                'name' => 'Administrator',
                'email' => 'admin@test.com',
                'password' => $password,
            ]);
    	 // And now, let's create a few articles in our database:
         // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
        
    }
}
