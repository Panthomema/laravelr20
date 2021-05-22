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
            'name' => 'Rafa',
            'email' => 'rafa@dws.es',
            'password' => bcrypt('secret'),
        ]);
        User::create([
            'name' => 'Pepe',
            'email' => 'pepe@dws.es',
            'password' => bcrypt('secret'),
        ]);

        User::create([
            'name' => 'Jonander',
            'email' => 'jonander@dws.es',
            'password' => bcrypt('secret'),
        ]);
    }
}
