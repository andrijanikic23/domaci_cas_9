<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::view('/admin/add-forecast', 'add_forecast')
    ->middleware(\App\Http\Middleware\AdminMiddleware::class)
    ->middleware('auth');
Route::post('/send-new-forecast', [\App\Http\Controllers\ForecastController::class, 'save']);
Route::get('/forecast',[\App\Http\Controllers\ForecastController::class, 'all_forecasts']);

Route::get('/forecast/{city}', [\App\Http\Controllers\ForecastController::class, 'index']);

Route::get('/forecasts/{city:name}', [\App\Http\Controllers\ForecastsController::class, 'index']);

Route::view("/admin/weather", "admin.weather_index");
Route::post("/admin/weather/update", [\App\Http\Controllers\AdminWeatherController::class, 'update'])->name("weather.update");


//Homework number 14
Route::view("/admin/forecasts", "admin.forecasts");
Route::post("/admin/forecasts/update", [\App\Http\Controllers\AdminForecastsController::class, 'entry'])->name("forecasts.entry");


require __DIR__.'/auth.php';
