<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'ICU/OT Care Beds',
            'Examination Tables',
            'Hospital Beds',
            'Hospital Furniture',
            'OT Lights',
            'Medical Trolleys',
            'Surgical Instruments',
            'Dialysis Equipment',
            'Patient Monitors',
            'Emergency Stretchers'
        ];

        foreach ($categories as $name) {
            \App\Models\Category::updateOrCreate(
                ['slug' => \Illuminate\Support\Str::slug($name)],
                ['name' => $name]
            );
        }
    }
}
