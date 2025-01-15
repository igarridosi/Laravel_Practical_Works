<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parking;
use App\Models\Cars;

class ParkingController extends Controller
{
    // List all Parking lots with their Cars (ordered by Parking lot name)
    public function listParkingLots()
    {
        $parkingLots = Parking::with('cars')->orderBy('name')->get();
        return response()->json($parkingLots);
    }

    // Get the latest 10 Cars that entered any Parking lot
    public function latestCars()
    {
        $latestCars = Cars::orderBy('created_at', 'desc')->take(10)->get();
        return response()->json($latestCars);
    }
}
