<?php

namespace Database\Seeders;

use Database\Seeders\BedSeeder;
use Database\Seeders\CmsSeeder;
use Database\Seeders\FaqSeeder;
use Database\Seeders\SeoSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\PlanSeeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\TeamSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\NurseSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\DoctorSeeder;
use Database\Seeders\IncomeSeeder;
use Database\Seeders\BedTypeSeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\ExpenseSeeder;
use Database\Seeders\FeatureSeeder;
use Database\Seeders\HolidaySeeder;
use Database\Seeders\InvoiceSeeder;
use Database\Seeders\SettingSeeder;
use Database\Seeders\BedFloorSeeder;
use Database\Seeders\CalendarSeeder;
use Database\Seeders\CurrencySeeder;
use Database\Seeders\EmployeeSeeder;
use Database\Seeders\IndustrySeeder;
use Database\Seeders\LanguageSeeder;
use Database\Seeders\MedicineSeeder;
use Database\Seeders\TeamSizeSeeder;
use Database\Seeders\BloodBankSeeder;
use Database\Seeders\AccountantSeeder;
use Database\Seeders\BloodDonorSeeder;
use Database\Seeders\DepartmentSeeder;
use Database\Seeders\PharmacistSeeder;
use Database\Seeders\AppointmentSeeder;
use Database\Seeders\DesignationSeeder;
use Database\Seeders\ManufactureSeeder;
use Database\Seeders\TestimonialSeeder;
use Database\Seeders\AnnouncementSeeder;
use Database\Seeders\BedAllotmentSeeder;
use Database\Seeders\LaboratoristSeeder;
use Database\Seeders\LeaveRequestSeeder;
use Database\Seeders\OrganizationSeeder;
use Database\Seeders\PrescriptionSeeder;
use Database\Seeders\ReceptionistSeeder;
use Database\Seeders\BloodDonationSeeder;
use Database\Seeders\ContactMessageSeeder;
use Database\Seeders\HolidayRequestSeeder;
use Database\Seeders\IncomeCategorySeeder;
use Database\Seeders\RolePermissionSeeder;
use Database\Seeders\ExpenseCategorySeeder;
use Database\Seeders\DiagnosticReportSeeder;
use Database\Seeders\MedicineCategorySeeder;
use Database\Seeders\DepartmentEmployeeSeeder;
use Database\Seeders\DiagnosticReportTypeSeeder;

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

            // Report
            PrescriptionSeeder::class,
            DiagnosticReportTypeSeeder::class,
            DiagnosticReportSeeder::class,

            // Payment
            InvoiceSeeder::class,
            ExpenseCategorySeeder::class,
            ExpenseSeeder::class,
            IncomeCategorySeeder::class,
            IncomeSeeder::class,

            // Medicine & prescription
            ManufactureSeeder::class,
            MedicineCategorySeeder::class,
            MedicineSeeder::class,

            // Leave & Holidays
            CountrySeeder::class,
            LeaveTypeSeeder::class,
            HolidaySeeder::class,

            // Settings
            LanguageSeeder::class,
            CurrencySeeder::class,
            SettingSeeder::class,

            // Others
            EventSeeder::class,
            AnnouncementSeeder::class,
            // AmbulanceSeeder::class,
            AppointmentSeeder::class,
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
