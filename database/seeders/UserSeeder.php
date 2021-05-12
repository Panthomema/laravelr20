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
        User::create(['id' => 1, 'name' => 'Jonander', 'email' => 'garciafdez@dws.com', 'password' => bcrypt('kerejetum')]);
        User::create(['id' => 2, 'name' => 'Ada', 'email' => 'hornificacion@dws.com', 'password' => bcrypt('continente')]);
        User::create(['id' => 3, 'name' => 'Ronaldinho', 'email' => 'hahahaha@dws.com', 'password' => bcrypt('soxer')]);
    }
}
