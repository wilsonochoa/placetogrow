<?php

namespace Database\Seeders;

use App\Domain\Microsites\Models\Currency;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Currency::create([
            'description' => 'COP',
        ]);
        Currency::create([
            'description' => 'USD',
        ]);
    }
}
