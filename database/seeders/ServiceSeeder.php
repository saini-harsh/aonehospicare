<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'title' => 'Ambulance Fabrication',
                'icon' => 'truck',
                'image' => 'services/ambulance.png',
                'description' => 'High-quality interior fabrication for all types of ambulances, including Basic Life Support (BLS) and Advanced Life Support (ALS) units. Features include custom oxygen manifolds, cabinetry & storage solutions, and electrical & lighting systems.',
            ],
            [
                'title' => 'O.T Doors Fabrication',
                'icon' => 'door-open',
                'image' => 'services/ot_doors.png',
                'description' => 'Hermetically sealed and non-hermetic doors designed specifically for Operation Theaters, ensuring sterility and air pressure control. Lead-lined for X-Ray rooms and automatic sliding options available.',
            ],
            [
                'title' => 'Oxygen Panel & Pipeline',
                'icon' => 'layers',
                'image' => 'services/oxygen_panel.png',
                'description' => 'Complete Medical Gas Pipeline System (MGPS) installation for ICU rooms, including bed head panels and alarm systems. Features centralized gas control and leak-proof copper piping.',
            ],
            [
                'title' => 'ICU Curtains Fabrications',
                'icon' => 'layout-grid',
                'image' => 'services/icu_curtains.png',
                'description' => 'Hospital privacy cubicle curtains and track systems, manufactured with medical-grade, antimicrobial fabrics. Flame retardant and tear-resistant mesh integrated.',
            ],
            [
                'title' => 'Refurbished Equipments',
                'icon' => 'refresh-cw',
                'image' => 'services/refurbished.png',
                'description' => 'Cost-effective refurbished hospital machines and equipment, fully tested and certified for safe medical use. Includes monitors, ventilators, and ICU beds with warranty.',
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['title' => $service['title']], $service);
        }
    }
}
