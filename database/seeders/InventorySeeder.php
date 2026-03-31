<?php

namespace Database\Seeders;

use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Database\Seeder;

class InventorySeeder extends Seeder
{
    public function run(): void
    {
        $quantities = [120, 85, 60, 15, 200, 75, 40, 30, 10, 500, 25, 18, 22, 310, 12, 400, 350, 90, 60, 145];

        Product::all()->each(function (Product $product, int $index) use ($quantities) {
            Inventory::create([
                'product_id' => $product->id,
                'quantity'   => $quantities[$index] ?? rand(10, 200),
            ]);
        });
    }
}
