<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductType;

class ProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductType::create(['id' => 1, 'name' => 'Refrescos']);
        ProductType::create(['id' => 2, 'name' => 'Cervezas']);
        ProductType::create(['id' => 3, 'name' => 'Combinados']);
    }
}
