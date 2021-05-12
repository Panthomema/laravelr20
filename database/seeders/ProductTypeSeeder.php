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
        ProductType::create(['id' => 1, 'name' => 'refrescos']);
        ProductType::create(['id' => 2, 'name' => 'cervezas']);
        ProductType::create(['id' => 3, 'name' => 'combinados']);
    }
}
