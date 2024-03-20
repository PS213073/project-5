<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SetDefaultCategoryForProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = \App\Models\Category::firstOrCreate(['name' => 'other']);

        \App\Models\Product::whereNull('category_id')->update(['category_id' => $category->id]);
    }
}
