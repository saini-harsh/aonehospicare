<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Dr. Rajesh Patel',
                'role' => 'Senior Surgeon, Apollo Hospitals',
                'content' => 'High-quality medical furniture that meets international standards. Their ICU beds have been extremely reliable in our facility for over 5 years.',
            ],
            [
                'name' => 'Sarah Jenkins',
                'role' => 'Hospital Administrator, Grace Health',
                'content' => 'Excellent service and fast delivery. The factory-direct pricing saved us significantly on our recent hospital renovation project without compromising on quality.',
            ],
            [
                'name' => 'Amit Mishra',
                'role' => 'Founder, City Care Clinic',
                'content' => 'The engineering and durability of A One Hospicare equipment is top-notch. Highly recommended for institutional setups looking for long-term reliability.',
            ],
            [
                'name' => 'Dr. Megha Sharma',
                'role' => 'Chief of Medicine, Fortis Healthcare',
                'content' => 'Their specialized patient care beds have significantly improved patient comfort in our wards. The ABS panels are very easy to sanitize and maintain.',
            ]
        ];

        foreach ($testimonials as $test) {
            Testimonial::create($test);
        }
    }
}
