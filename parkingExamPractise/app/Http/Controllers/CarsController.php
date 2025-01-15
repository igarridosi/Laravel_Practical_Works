<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parking;
use App\Models\Cars;

class CarsController extends Controller
{
    // Get details of a car by license plate
    public function getCarDetails($licensePlate)
    {
        $car = Cars::where('license_plate', $licensePlate)->first();

        if (!$car) {
            return response()->json(['error' => 'Car not found'], 404);
        }

        return response()->json($car);
    }

    // Delete a car by ID
    public function deleteCar($id)
    {
        $car = Cars::find($id);

        if (!$car) {
            return response()->json(['error' => 'Car not found'], 404);
        }

        $car->delete();
        return response()->json(['message' => 'Car deleted successfully']);
    }

    // Add a car to a parking lot
    public function addCarToParkingLot(Request $request)
    {
        $validatedData = $request->validate([
            'license_plate' => 'required|string|unique:cars',
            'model' => 'required|string',
            'size' => 'required|integer',
            'parking_lot_id' => 'required|exists:parkings,id',
        ]);

        $parkingLot = Parking::find($validatedData['parking_lot_id']);

        if ($parkingLot->cars->count() >= $parkingLot->capacity) {
            return response()->json(['error' => 'Parking lot capacity reached'], 400);
        }

        $car = new Cars();
        $car->fill($validatedData);
        $car->save();

        return response()->json(['message' => 'Car added successfully', 'car' => $car]);
    }
}
