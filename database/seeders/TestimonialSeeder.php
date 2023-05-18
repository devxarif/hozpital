<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testimonials = [
            [
                'name' => 'John Doe',
                'title' => 'Friendly Environment',
                'image' => 'assets/images/team/img-1.jpg',
                'description' => 'Sincerely, I am very grateful to the technical support and friendly environment that I found in this hospital. I was able to recover very quickly. Thank you very much to all the staff.',
            ],
            [
                'name' => 'Nargis Parveen',
                'title' => "Amazing Service",
                'image' => 'assets/images/team/img-2.jpg',
                'description' => 'They are Excellent in all their services. Very organized doctors. I am very happy with the service. I recommend it to everyone.',
            ],
            [
                'name' => 'Roman Monroe',
                'title' => 'Great Support',
                'image' => 'assets/images/team/img-3.jpg',
                'description' => 'Their treatment is very good. I am very happy with the service. I recommend it to everyone.',
            ],
            [
                'name' => 'Ahmed Ali',
                'title' => 'Highly Recommended',
                'image' => 'assets/images/team/img-4.jpg',
                'description' => 'I am very happy with the service. I recommend it to everyone.',
            ]
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
