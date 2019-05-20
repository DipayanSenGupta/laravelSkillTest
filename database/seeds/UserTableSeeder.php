<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->truncate();
    	$faker = \Faker\Factory::create();
    	$religions_array = array("Hindusm","Muslim","Budhi","Cristian","Jew","None Of Your Business");
    	foreach (range(1,50) as $index ) {
    		App\User::create([
    			'name' => $faker->name,
            'religion' => $religions_array[rand(0,4)],
            'email' => $faker->email,
            'password' => bcrypt('secret'),
    		]);
    	}
    }
}
