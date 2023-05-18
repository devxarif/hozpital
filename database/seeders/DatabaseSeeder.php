<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\NewsSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\PartnerSeeder;
use Database\Seeders\ServiceSeeder;
use Database\Seeders\TestimonialSeeder;


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
            // User and Roles
            RolePermissionSeeder::class,
            AdminSeeder::class,
            DepartmentSeeder::class,
            DoctorSeeder::class,
            AccountantSeeder::class,
            NurseSeeder::class,
            PharmacistSeeder::class,
            ReceptionistSeeder::class,
            LaboratoristSeeder::class,
            PatientSeeder::class,

            // Bed
            BedFloorSeeder::class,
            BedTypeSeeder::class,
            BedSeeder::class,
            BedAllotmentSeeder::class,

            // Blood and Blood Donor
            BloodDonorSeeder::class,
            BloodBankSeeder::class,
            BloodDonationSeeder::class,

            // Payment
            BillingSeeder::class,
            ExpenseCategorySeeder::class,
            ExpenseSeeder::class,
            IncomeCategorySeeder::class,
            IncomeSeeder::class,
            OrderSeeder::class,

            // Product & prescription
            ManufactureSeeder::class,
            ProductCategorySeeder::class,
            ProductSeeder::class,

            // Report
            AppointmentSeeder::class,
            AppointmentSlotSeeder::class,
            PrescriptionSeeder::class,
            PrescriptionMedicineSeeder::class,
            DiagnosticReportTypeSeeder::class,
            DiagnosticReportSeeder::class,

            // Leave & Holidays
            // CountrySeeder::class,
            LeaveTypeSeeder::class,
            LeaveRequestSeeder::class,
            // HolidaySeeder::class,

            // Settings
            LanguageSeeder::class,
            SettingSeeder::class,
            SeoSeeder::class,

            // Others
            EventSeeder::class,
            AnnouncementSeeder::class,
            ServiceSeeder::class,
            TestimonialSeeder::class,
            PartnerSeeder::class,
            NewsCategorySeeder::class,
            NewsSeeder::class,
            // AmbulanceSeeder::class,
            // AppointmentSeeder::class,
        ]);
        // $this->call([
        //     RolePermissionSeeder::class,
        //     AdminSeeder::class,
        //     LanguageSeeder::class,
        //     CurrencySeeder::class,
        //     SettingSeeder::class,
        // ]);
        // $this->call([
        //     RolePermissionSeeder::class,
        //     TeamSizeSeeder::class,
        //     PlanSeeder::class,
        //     AdminSeeder::class,
        //     PostSeeder::class,
        //     // ThemeSeeder::class,
        //     CountrySeeder::class,
        //     IndustrySeeder::class,
        //     OrganizationSeeder::class,
        //     TeamSeeder::class,
        //     DepartmentSeeder::class,
        //     EmployeeSeeder::class,
        //     DepartmentEmployeeSeeder::class,
        //     DesignationSeeder::class,

        //     CalendarSeeder::class,
            // LeaveRequestSeeder::class,
        //     HolidayRequestSeeder::class,
        //     FaqSeeder::class,
        //     FeatureSeeder::class,
        //     TestimonialSeeder::class,
        //     LanguageSeeder::class,
        //     CurrencySeeder::class,
        //     OrderSeeder::class,
        //     SettingSeeder::class,
        //     ContactMessageSeeder::class,
        //     SeoSeeder::class,
        //     CmsSeeder::class,
        // ]);
    }
}
