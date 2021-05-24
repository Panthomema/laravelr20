<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fiesta;

class FiestaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fiesta::create(['id' => 1, 'description' => 'Festival estival', 'max_people' => '200', 'date' => '2021-07-10', 'price' => '15', 'private' => FALSE, 'user_id' => '3']);
    }
}
