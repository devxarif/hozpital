<?php

namespace Database\Seeders;

use Database\Seeders\CmsSeeder;
use Database\Seeders\FaqSeeder;
use Database\Seeders\SeoSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\PlanSeeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\TeamSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\FeatureSeeder;
use Database\Seeders\SettingSeeder;
use Database\Seeders\CalendarSeeder;
use Database\Seeders\CurrencySeeder;
use Database\Seeders\EmployeeSeeder;
use Database\Seeders\IndustrySeeder;
use Database\Seeders\LanguageSeeder;
use Database\Seeders\TeamSizeSeeder;
use Database\Seeders\DesignationSeeder;
use Database\Seeders\TestimonialSeeder;
use Database\Seeders\LeaveRequestSeeder;
use Database\Seeders\OrganizationSeeder;
use Database\Seeders\ContactMessageSeeder;
use Database\Seeders\HolidayRequestSeeder;
use Database\Seeders\DepartmentEmployeeSeeder;

class DatabaseSeeder extends Seeder
{
     /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // For Packaging
        // $this->packagingVersion();

        // For Development
        $this->developmentVersion();
    }

    private function packagingVersion()
    {
        $this->call([
            // MasterSeeder::class,
            // ThemeSeeder::class,
            CountrySeeder::class,
            FeatureSeeder::class,
            SettingSeeder::class,
            SeoSeeder::class,
            CmsSeeder::class,
        ]);
    }

    private function developmentVersion()
    {
        $this->call([
            RolePermissionSeeder::class,
            TeamSizeSeeder::class,
            PlanSeeder::class,
            AdminSeeder::class,
            PostSeeder::class,
            // ThemeSeeder::class,
            CountrySeeder::class,
            IndustrySeeder::class,
            OrganizationSeeder::class,
            TeamSeeder::class,
            DepartmentSeeder::class,
            EmployeeSeeder::class,
            DepartmentEmployeeSeeder::class,
            DesignationSeeder::class,


            CalendarSeeder::class,
            LeaveRequestSeeder::class,
            HolidayRequestSeeder::class,
            FaqSeeder::class,
            FeatureSeeder::class,
            TestimonialSeeder::class,
            LanguageSeeder::class,
            CurrencySeeder::class,
            OrderSeeder::class,
            SettingSeeder::class,
            ContactMessageSeeder::class,
            SeoSeeder::class,
            CmsSeeder::class,
        ]);
    }
}
