<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $fillable = [
        'name', 'capacity', 'location'
    ];

    public function cars() {
        return $this->hasMany(Cars::class, 'parking_lot_id');
    }
}
