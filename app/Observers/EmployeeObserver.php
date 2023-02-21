<?php

namespace App\Observers;

use App\Models\Employee;
use App\Notifications\Organization\NewEmployeeJoined;

class EmployeeObserver
{
    /**
     * Handle the Employee "created" event.
     *
     * @return void
     */
    public function created(Employee $employee)
    {
        // Notification for company
        $employee->company->user->notify(new NewEmployeeJoined($employee->user, $employee->organization_id));
    }

    /**
     * Handle the Employee "updated" event.
     *
     * @return void
     */
    public function updated(Employee $employee)
    {
        //
    }

    /**
     * Handle the Employee "deleted" event.
     *
     * @return void
     */
    public function deleted(Employee $employee)
    {
        //
    }

    /**
     * Handle the Employee "restored" event.
     *
     * @return void
     */
    public function restored(Employee $employee)
    {
        //
    }

    /**
     * Handle the Employee "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(Employee $employee)
    {
        //
    }
}
