<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $filable = [
        'licensePlate', 'model', 'size', 'parking_lot_id'
    ];

    public function parkingLot() {
        return $this->belongsTo(Parking::class, 'parking_lot_id');
    }
}
