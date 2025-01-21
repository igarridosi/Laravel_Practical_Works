<?php

namespace Database\Seeders;

use App\Models\Authors;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorsSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Authors::create([ 'name'=>'Mikel', 'age'=>41, 'genre'=>'Fiction']);
        Authors::create([ 'name'=>'Nagore', 'age'=>28, 'genre'=>'Drama']);
    }
}
