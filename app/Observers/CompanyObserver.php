<?php

namespace App\Observers;

use App\Models\Company;
use App\Models\User;
use App\Notifications\Admin\NewCompanyJoined;

class CompanyObserver
{
    /**
     * Handle the Company "created" event.
     *
     * @return void
     */
    public function created(Company $company)
    {
        User::roleAdmin()->get()->each(function ($user) use ($company) {
            $user->notify(new NewCompanyJoined($company));
        });

        $company->theme()->create();
    }

    /**
     * Handle the Company "updated" event.
     *
     * @return void
     */
    public function updated(Company $company)
    {
        //
    }

    /**
     * Handle the Company "deleted" event.
     *
     * @return void
     */
    public function deleted(Company $company)
    {
        //
    }

    /**
     * Handle the Company "restored" event.
     *
     * @return void
     */
    public function restored(Company $company)
    {
        //
    }

    /**
     * Handle the Company "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(Company $company)
    {
        //
    }
}
