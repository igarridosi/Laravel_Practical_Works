<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Parking;

class ParkingLotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Parking::create(['name' => 'Lot A', 'capacity' => 2, 'location' => 'north']);
        Parking::create(['name' => 'Lot B', 'capacity' => 10, 'location' => 'east']);
        Parking::create(['name' => 'Lot C', 'capacity' => 20, 'location' => 'west']);
    }
}
