<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    protected $fillable = [
        'name',
        'age',
        'genre',
    ];

    public function books()
    {
        return $this->hasMany(Books::class, 'author_id');
    }

}
