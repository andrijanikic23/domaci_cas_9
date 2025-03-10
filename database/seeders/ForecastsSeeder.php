<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForecastsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ForecastsModel::truncate();

        $all_cities = CitiesModel::all();

        $faker = Factory::create();
        foreach($all_cities as $city)
        {

            for ($i=0; $i<5; $i++)
            {
                ForecastsModel::create([
                    'city_id' => $city->id,
                    'temperature' => $faker->numberBetween($min=0, $max=40),
                    'date' => $faker->date(),
                ]);
            }
        }
    }
}
