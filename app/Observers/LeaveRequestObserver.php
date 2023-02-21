<?php

namespace App\Observers;

use App\Models\LeaveRequest;

class LeaveRequestObserver
{
    /**
     * Handle the LeaveRequest "created" event.
     *
     * @return void
     */
    public function created(LeaveRequest $leaveRequest)
    {
        //
    }

    /**
     * Handle the LeaveRequest "updated" event.
     *
     * @return void
     */
    public function updated(LeaveRequest $leaveRequest)
    {
        //
    }

    /**
     * Handle the LeaveRequest "deleted" event.
     *
     * @return void
     */
    public function deleted(LeaveRequest $leaveRequest)
    {
        //
    }

    /**
     * Handle the LeaveRequest "restored" event.
     *
     * @return void
     */
    public function restored(LeaveRequest $leaveRequest)
    {
        //
    }

    /**
     * Handle the LeaveRequest "force deleted" event.
     *
     * @return void
     */
    public function forceDeleted(LeaveRequest $leaveRequest)
    {
        //
    }
}
