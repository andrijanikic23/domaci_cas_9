<?php

namespace Database\Seeders;

use App\Models\CitiesModel;
use App\Models\WeatherModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $all_cities = CitiesModel::all();

        foreach ($all_cities as $city)
        {
            WeatherModel::create([
                'city_id' => $city->id,
                'temperature' => 25,
            ]);
        }
    }
}
