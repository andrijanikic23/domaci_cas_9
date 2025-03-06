<?php

namespace Database\Seeders;

use App\Models\ForecastModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForecastUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city = $this->command->getOutput()->ask("What's the name of city?");

        $all_forecasts = ForecastModel::all();
        foreach($all_forecasts as $forecast)
        {
            if($city === $forecast->city)
            {
                $this->command->getOutput()->error("That city is already taken! You can't enter that data.");
                exit(1);
            }
        }

        if($city ===null)
        {
            $this->command->getOutput()->error("You haven't entered the name of city!");
        }

        $temperature = $this->command->getOutput()->ask("How many degrees?", 20);
        if($temperature ===null)
        {
            $this->command->getOutput()->error("You haven't entered temperature!");
        }

        $weather = $this->command->getOutput()->ask("What's the weather like?", "sunny");
        if($weather ===null)
        {
            $this->command->getOutput()->error("You haven't entered what's the weather like!");
        }



        ForecastModel::create([
            'city' => $city,
            'temperature' => $temperature,
            'weather' => $weather

        ]);

    }
}
