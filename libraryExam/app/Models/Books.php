<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $fillable = [
        'title',
        'release_date',
        'author_id',
    ];

    public function author()
    {
        return $this->belongsTo(Authors::class, 'author_id');
    }

}
