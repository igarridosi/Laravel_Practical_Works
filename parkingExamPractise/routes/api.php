<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\CarsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/parking-lots', [ParkingController::class, 'listParkingLots']);
Route::get('/cars/latest', [ParkingController::class, 'latestCars']);
Route::get('/cars/{licensePlate}', [CarsController::class, 'getCarDetails']);
Route::delete('/cars/{id}', [CarsController::class, 'deleteCar']);
Route::post('/cars', [CarsController::class, 'addCarToParkingLot']);
