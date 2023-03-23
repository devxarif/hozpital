<?php

namespace Database\Seeders;

use App\Models\Seo;
use Illuminate\Database\Seeder;

class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pages = [
            [
                'page_name' => 'Home',
                'page_slug' => 'home',
                'title' => 'Hozpital - Hospital Management System',
                'description' => 'Hozpital is hospital management system that helps you to manage your hospital and get the best hospital management system in the world.',
                'keywords' => 'home, hospital, management, laravel, vuejs',
            ],
            [
                'page_name' => 'About',
                'page_slug' => 'about',
                'title' => 'About Us | Hozpital - Hospital Management System',
                'description' => 'Hozpital is hospital management system that helps you to manage your hospital and get the best hospital management system in the world',
                'keywords' => 'about, hospital, management, laravel, vuejs',
            ],
            [
                'page_name' => 'Department',
                'page_slug' => 'department',
                'title' => 'Department | Hozpital - Hospital Management System',
                'description' => 'Hozpital is hospital management system that helps you to manage your hospital and get the best hospital management system in the world',
                'keywords' => 'blog, hospital, management, laravel, vuejs',
            ],
            [
                'page_name' => 'Blog',
                'page_slug' => 'blog',
                'title' => 'Blog | Hozpital - Hospital Management System',
                'description' => 'Hozpital is hospital management system that helps you to manage your hospital and get the best hospital management system in the world',
                'keywords' => 'blog, hospital, management, laravel, vuejs',
            ],
            [
                'page_name' => 'Privacy Policy',
                'page_slug' => 'privacy-policy',
                'title' => 'Privacy Policy | Hozpital - Hospital Management System',
                'description' => 'Hozpital is hospital management system that helps you to manage your hospital and get the best hospital management system in the world',
                'keywords' => 'privacy policy, hospital, management, laravel, vuejs',
            ],
            [
                'page_name' => 'Terms & Conditions',
                'page_slug' => 'terms-conditions',
                'title' => 'Terms & Conditions | Hozpital - Hospital Management System',
                'description' => 'Hozpital is hospital management system that helps you to manage your hospital and get the best hospital management system in the world',
                'keywords' => 'terms & condition, hospital, management, laravel, vuejs',
            ],
            [
                'page_name' => 'Contact',
                'page_slug' => 'contact',
                'title' => 'Contact | Hozpital - Hospital Management System',
                'description' => 'Hozpital is hospital management system that helps you to manage your hospital and get the best hospital management system in the world',
                'keywords' => 'contact, hospital, management, laravel, vuejs',
            ],
        ];

        foreach ($pages as $page) {
            Seo::create($page);
        }
    }
}
