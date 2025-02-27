<?php

namespace Database\Seeders;

use App\Models\Sale;
use App\Models\Product;
use App\Models\SaleItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Create 10 sales
         for ($i = 0; $i < 10; $i++) {
            $sale = Sale::create([
                'total_price' => 0, // Will be updated later
                'created_at' => now()->subDays(rand(1, 30)), // Random sale date in the last 30 days
            ]);

            $totalPrice = 0;

            // Pick 2-5 random products for each sale
            $products = Product::inRandomOrder()->limit(rand(2, 5))->get();

            foreach ($products as $product) {
                $quantity = rand(1, 5);
                $price = $product->price * $quantity;
                $totalPrice += $price;

                SaleItem::create([
                    'sale_id' => $sale->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                ]);
            }

            // Update the sale with the total price
            $sale->update(['total_price' => $totalPrice]);
        }
    }
}
