<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cars;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Cars::create(['license_plate' => '2329HLP', 'model' => 'Toyota', 'size' => 100, 'parking_lot_id' => 1]);
        Cars::create(['license_plate' => '1029TWE', 'model' => 'Tesla', 'size' => 110, 'parking_lot_id' => 3]);
        Cars::create(['license_plate' => '5142KST', 'model' => 'Audi', 'size' => 120, 'parking_lot_id' => 1]);
    }
}
