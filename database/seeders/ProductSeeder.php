<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(['id' => 1, 'name' => 'Kas Limón', 'price' => '1.80', 'product_type_id' => '1', 'description' => 'Purito azúcar.']);
        Product::create(['id' => 2, 'name' => 'Alhambra', 'price' => '1.50', 'product_type_id' => '2', 'description' => 'Primavera Sound']);
        Product::create(['id' => 3, 'name' => 'Ámbar 1900', 'price' => '2.00', 'product_type_id' => '2', 'description' => 'Independientes desde entonces']);
        Product::create(['id' => 4, 'name' => 'Gin Tonic', 'price' => '4.50', 'product_type_id' => '3', 'description' => 'Y misa.']);
        Product::create(['id' => 5, 'name' => 'El Secreto', 'price' => '2.50', 'product_type_id' => '3', 'description' => 'Este muchacho; es un roibero.']);
    }
}
