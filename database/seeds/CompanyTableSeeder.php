<?php

use Illuminate\Database\Seeder;
use App\Company;
class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('companies')->truncate();
    	$faker = \Faker\Factory::create();
    	foreach (range(1,50) as $index ) {
    		Company::create([
    			'name' => $faker->company,
            'website' => $faker->name . ".com",
            'email' => $faker->email,
    		]);
    	}
    }
}
