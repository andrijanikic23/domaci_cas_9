<?php

namespace App\Http\Controllers;

use App\Models\ForecastModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ForecastController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Ovaj middleware sprečava neulogovane korisnike da pristupe kontroleru
    }

    public function save(Request $request)
    {
        $request->validate([
            "city" => "required|string",
            "temperature" => "required|numeric",
            "weather" => "required|string"
        ]);

        ForecastModel::create([
            "city" => $request->get("city"),
            "temperature" => $request->get("temperature"),
            "weather" => $request->get("weather")
        ]);

        return redirect('forecast');

    }

    public function all_forecasts()
    {
        $forecasts = ForecastModel::all();
        return view('forecast', compact('forecasts'));
    }
}
