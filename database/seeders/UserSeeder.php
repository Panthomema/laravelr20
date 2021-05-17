<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'rafa',
            'email' => 'rafa@dws.es',
            'password' => bcrypt('secret'),
        ]);
        User::create([
            'name' => 'pepe',
            'email' => 'pepe@dws.es',
            'password' => bcrypt('secret'),
        ]);
    }
}
