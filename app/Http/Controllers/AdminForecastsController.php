<?php

namespace App\Http\Controllers;

use App\Models\ForecastsModel;
use Illuminate\Http\Request;

class AdminForecastsController extends Controller
{
    public function entry(Request $request)
    {
        $request->validate([
            "city_id" => "required|exists:forecasts,city_id",
            "date" => "required",
            "temperature" => "required",
            "weather_type" => "required",
            "probability" => "nullable|min:0|max:100",
        ]);

        ForecastsModel::create([
            "city_id" => $request->get("city_id"),
            "temperature" => $request->get("temperature"),
            "date" => $request->get("date"),
            "weather_type" => $request->get("weather_type"),
            "probability" => $request->get("probability"),
        ]);

        return redirect()->back();
    }


}
