<?php


namespace Database\Seeders;

use App\Models\RealEstate;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RealEstateSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            RealEstate::create([
                'name' => $faker->words(2, true),
                'real_state_type' => $faker->randomElement(['house', 'department', 'land', 'commercial_ground']),
                'street' => $faker->streetName,
                'external_number' => $faker->bothify('##??'),
                'internal_number' => $faker->randomElement([null, $faker->bothify('??##')]),
                'neighborhood' => $faker->words(2, true),
                'city' => $faker->city,
                'country' => $faker->countryCode,
                'rooms' => $faker->numberBetween(1, 10),
                'bathrooms' => $faker->numberBetween(1, 5),
                'comments' => $faker->sentence,
            ]);
        }
    }
}


