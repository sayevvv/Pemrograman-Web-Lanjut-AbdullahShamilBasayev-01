<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Define categories and their respective products
        $categories = [
            ['name' => 'Food-Beverage', 'slug' => 'food-beverage', 'products' => ['Soda', 'Chips', 'Chocolate', 'Coffee', 'Juice']],
            ['name' => 'Beauty-Health', 'slug' => 'beauty-health', 'products' => ['Shampoo', 'Soap', 'Lotion', 'Face Wash', 'Toothpaste']],
            ['name' => 'Home-Care', 'slug' => 'home-care', 'products' => ['Detergent', 'Floor Cleaner', 'Dish Soap', 'Air Freshener', 'Trash Bags']],
            ['name' => 'Baby-Kid', 'slug' => 'baby-kid', 'products' => ['Baby Milk', 'Diapers', 'Baby Powder', 'Baby Wipes', 'Pacifier']],
        ];

        foreach ($categories as $categoryData) {
            // Create category with name and slug
            $category = Category::create([
                'name' => $categoryData['name'],
                'slug' => $categoryData['slug'],
            ]);

            // Create 5 products under the category
            foreach ($categoryData['products'] as $productName) {
                Product::create([
                    'category_id' => $category->id,
                    'name' => $productName,
                    'price' => rand(5000, 50000), // Random price between 5,000 - 50,000
                    'stock' => rand(10, 100), // Random stock between 10 - 100
                ]);
            }
        }
        
        $this->call(SalesSeeder::class);
    }
}
