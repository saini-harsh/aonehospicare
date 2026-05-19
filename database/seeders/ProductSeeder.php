<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $icuCategory = Category::where('name', 'LIKE', '%ICU%')->first();
        
        if (!$icuCategory) {
            $icuCategory = Category::create([
                'name' => 'ICU/OT Care Beds',
                'slug' => 'icu-ot-care-beds'
            ]);
        }

        $products = [
            [
                'title' => 'ICU PATIENT CARE BED - 5 FUNCTIONAL (Durable Build)',
                'features' => "DURABLE BUILD:\nMS PERFORATED TOP WITH A POWDER-COATED FRAME FOR LONG-LASTING USE.\nADVANCED FUNCTIONALITY:\nBACKREST ADJUSTMENT: 0° TO 75°\nLEG REST ADJUSTMENT: 0° TO 45°\nHEIGHT ADJUSTMENT: 500 MM TO 750 MM\nTRENDELENBURG & REVERSE TRENDELENBURG\nABS PANELS & SIDE RAILS",
                'code' => 'AOH-151-A',
                'price' => 125000,
            ],
            [
                'title' => 'ICU PATIENT CARE BED - 5 FUNCTIONAL (ABS Premium)',
                'features' => "5 FUNCTIONAL POSITIONS:\nBACKREST ADJUSTMENT: 0° TO 75°\nLEG REST ADJUSTMENT: 0° TO 45°\nHEIGHT ADJUSTMENT: 500 MM TO 750 MM\nTRENDELENBURG & REVERSE TRENDELENBURG\nDURABLE CONSTRUCTION:\nMS PERFORATED THE TOP FOR STRENGTH AND VENTILATION. POWDER-COATED FRAME FOR RUST RESISTANCE AND LONG-LASTING USE.\nABS PANELS & COLLAPSIBLE RAILING:\nDETACHABLE ABS HEAD AND FOOT PANELS FOR EASY MAINTENANCE. COLLAPSIBLE SIDE RAILS FOR ENHANCED PATIENT SAFETY.",
                'code' => 'AOH-151-B',
                'price' => 135000,
            ],
            [
                'title' => 'HIGH-LOW 4 FUNCTIONAL MANUAL BED (ABS)',
                'features' => "THIS MANUAL BED IS DESIGNED FOR PATIENT COMFORT AND CAREGIVER EASE, FEATURING 4 FUNCTIONAL ADJUSTMENTS OPERATED SMOOTHLY THROUGH 4 GEARS. THE HIGH-LOW ADJUSTMENT TRENDULBRUG AND REVERSE TRENDULBRUG AND DURABLE MS FRAME WITH A POWDER-COATED FINISH ENSURE RELIABILITY AND LONG-LASTING PERFORMANCE.\nEQUIPPED WITH DETACHABLE ABS PANELS, COLLAPSIBLE SIDE RAILS FOR SAFETY, AND WHEELS FOR MOBILITY, THIS BED PROVIDES BOTH CONVENIENCE AND STABILITY.",
                'code' => 'AOH-141-ABS',
                'price' => 85000,
            ],
            [
                'title' => 'HIGH-LOW 4 FUNCTIONAL MANUAL BED (SS NOVA)',
                'features' => "THIS MANUAL BED IS DESIGNED FOR PATIENT COMFORT AND CAREGIVER EASE, FEATURING 4 FUNCTIONAL ADJUSTMENTS OPERATED SMOOTHLY THROUGH 4 GEARS. THE HIGH-LOW ADJUSTMENT TRENDULBRUG AND REVERSE TRENDULBRUG AND DURABLE MS FRAME WITH A POWDER-COATED FINISH ENSURE RELIABILITY AND LONG-LASTING PERFORMANCE.\nEQUIPPED WITH SS NOVA PANELS, COLLAPSIBLE SIDE RAILS FOR SAFETY, AND WHEELS FOR MOBILITY, THIS BED PROVIDES BOTH CONVENIENCE AND STABILITY.",
                'code' => 'AOH-141-SS',
                'price' => 95000,
            ]
        ];

        foreach ($products as $pData) {
            Product::updateOrCreate(
                ['slug' => Str::slug($pData['title'])],
                [
                    'category_id' => $icuCategory->id,
                    'title' => $pData['title'],
                    'features' => $pData['features'],
                    'code' => $pData['code'],
                    'price' => $pData['price'],
                    'is_latest' => true
                ]
            );
        }
    }
}
