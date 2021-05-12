<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
<<<<<<< HEAD
            //UserSeeder::class,
            ProductTypeSeeder::class,
        ]);
=======
            UserSeeder::class,
            ProductTypeSeeder::class,
        ]);        
>>>>>>> 8893f5f1a3192a96da97506565b6c406931af84e
    }
}
