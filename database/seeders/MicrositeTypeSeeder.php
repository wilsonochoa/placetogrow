<?php

namespace Database\Seeders;

use App\Domain\Microsites\Models\MicrositeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MicrositeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MicrositeType::create([
            'description' => 'prueba',
        ]);
    }
}
