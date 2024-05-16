<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Sandalia Promedio',
            'description' => 'Es una sandalia de toda la vida',
            'price' => 5.99,
        ]);

        Product::create([
            'name' => 'Sandalia Pro',
            'description' => 'Es una sandalia pro',
            'price' => 10.99,
        ]);

        Product::create([
            'name' => 'Sandalia Brasileña',
            'description' => 'Es una sandalia brasileña',
            'price' => 2.99,
        ]);
    }
}
