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
<<<<<<< HEAD
        User::create(['id' => 1, 'name' => 'Jonander', 'email' => 'garciafdez@dws.com', 'password' => bcrypt('kerejetum')]);
        User::create(['id' => 2, 'name' => 'Ada', 'email' => 'hornificacion@dws.com', 'password' => bcrypt('continente')]);
        User::create(['id' => 3, 'name' => 'Ronaldinho', 'email' => 'hahahaha@dws.com', 'password' => bcrypt('soxer')]);
=======
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
>>>>>>> 8893f5f1a3192a96da97506565b6c406931af84e
    }
}
