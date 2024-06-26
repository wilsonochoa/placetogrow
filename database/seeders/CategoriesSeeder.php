<?php

namespace Database\Seeders;

use App\Domain\Microsites\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'description' => 'USD',
            'status' => '1'
        ]);
    }
}
