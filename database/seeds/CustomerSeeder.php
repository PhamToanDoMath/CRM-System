<?php

use Illuminate\Database\Seeder;
use App\Models\Customer;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for( $i = 0; $i < 30; $i++){
            Customer::create([
                'name' => $faker->name,
                'phoneNumber' => $faker->unique()->phoneNumber,
                'address' => $faker->unique()->address,
                'created_at' => now(),
            ]);
        }
    }
}
