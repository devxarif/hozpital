<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Holiday;
use App\Models\Industry;
use App\Models\TeamSize;
use App\Models\User;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    public function createHoliday($organization, $country)
    {
        $holidays = getHolidays($country->code);

        for ($i = 0; $i < count($holidays); $i++) {
            $holiday_data[] = [
                'organization_id' => $organization->id,
                'title' => $holidays[$i]['title'],
                'start' => $holidays[$i]['start'],
                'end' => $holidays[$i]['end'],
                'days' => diffBetweenDays($holidays[$i]['start'], $holidays[$i]['end']),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        $holiday_chunks = array_chunk($holiday_data, ceil(count($holiday_data) / 3));

        foreach ($holiday_chunks as $country) {
            Holiday::insert($country);
        }
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Owner and organization create
        $bdCountry = Country::where('code', 'bd')->first();
        $johnOwner = User::create([
            'name' => 'Ariful Islam',
            'email' => 'owner@mail.com',
            'password' => bcrypt('password'),
            'avatar' => 'admin/img/default-user.png',
            'is_opening_setup_complete' => 1,
            'username' => 'owner',
        ]);
        $kodebazar = $johnOwner->companies()->create([
            'country_id' => $bdCountry->id,
            'team_size_id' => TeamSize::inRandomOrder()->value('id'),
            'industry_id' => Industry::inRandomOrder()->value('id'),
            'organization_name' => 'Kodebazar',
            'organization_email' => 'kodebazar@gmail.com',
            'organization_phone' => '123456789',
            'organization_website' => 'http://kodebazar.devarif.co',
        ]);
        $templatecookie = $johnOwner->companies()->create([
            'country_id' => $bdCountry->id,
            'team_size_id' => TeamSize::inRandomOrder()->value('id'),
            'industry_id' => Industry::inRandomOrder()->value('id'),
            'organization_name' => 'Templatecookie',
            'organization_email' => 'templatecookie@gmail.com',
            'organization_phone' => '123456789',
            'organization_website' => 'http://templatecookie.com',
        ]);
        $johnOwner->update(['current_organization_id' => $kodebazar->id]);
        $this->createHoliday($kodebazar, $bdCountry);
        $this->createHoliday($templatecookie, $bdCountry);

        // Owner and organization create
        $inCountry = Country::where('code', 'bd')->first();
        $smithOwner = User::create([
            'name' => 'John Smith',
            'email' => 'owner2@mail.com',
            'password' => bcrypt('password'),
            'avatar' => 'admin/img/default-user.png',
            'is_opening_setup_complete' => 1,
            'username' => 'owner2',
        ]);
        $zakirsoft = $smithOwner->companies()->create([
            'country_id' => $inCountry->id,
            'team_size_id' => TeamSize::inRandomOrder()->value('id'),
            'industry_id' => Industry::inRandomOrder()->value('id'),
            'organization_name' => 'Zakirsoft',
            'organization_email' => 'zakirsoft@gmail.com',
            'organization_phone' => '123456789',
            'organization_website' => 'http://zakirsoft.com',
        ]);
        $smithOwner->update(['current_organization_id' => $zakirsoft->id]);
        $this->createHoliday($zakirsoft, $inCountry);

        // Owner and organization create
        $banCountry = Country::where('code', 'bd')->first();
        $clarkOwner = User::create([
            'name' => 'Clark',
            'email' => 'owner3@mail.com',
            'password' => bcrypt('password'),
            'avatar' => 'admin/img/default-user.png',
            'is_opening_setup_complete' => 1,
            'username' => 'owner3',
        ]);
        $clarkCorporation = $clarkOwner->companies()->create([
            'country_id' => $banCountry->id,
            'team_size_id' => TeamSize::inRandomOrder()->value('id'),
            'industry_id' => Industry::inRandomOrder()->value('id'),
            'organization_name' => 'Clark Corporation',
            'organization_email' => 'clarkcorporation@gmail.com',
            'organization_phone' => '123456789',
            'organization_website' => 'http://clarkcorporation.com',
        ]);
        $clarkOwner->update(['current_organization_id' => $clarkCorporation->id]);
        $this->createHoliday($clarkCorporation, $banCountry);
    }
}
