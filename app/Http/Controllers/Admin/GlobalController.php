<?php

namespace App\Http\Controllers\Admin;

use App\Models\BedType;
use App\Models\Country;
use App\Models\BedFloor;
use App\Models\TeamSize;
use App\Models\LeaveType;
use App\Models\BloodDonor;
use App\Models\Department;
use App\Models\LeaveBalance;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Http\Controllers\Controller;
use App\Models\IncomeCategory;
use App\Models\Manufacture;
use App\Models\ProductCategory;

class GlobalController extends Controller
{
    public function fetchDepartments(){
        return Department::select('id','name')->latest()->get();
    }

    public function fetchProductCategories(){
        return ProductCategory::latest()->get(['id','name']);
    }

    public function fetchManufactures(){
        return Manufacture::latest()->get(['id','name','email','phone']);
    }

    public function fetchBedTypes(){
        return BedType::withCount('beds')->latest()->get(['id','name']);
    }

    public function fetchBedFloors(){
        return BedFloor::latest()->get(['id','name']);
    }

    public function bloodDonors(){
        return BloodDonor::latest()->get(['id','name','blood_group','email']);
    }

    public function incomeCategories(){
        return IncomeCategory::latest()->get(['id','name']);
    }

    public function expenseCategories(){
        return IncomeCategory::latest()->get(['id','name']);
    }

    public function fetchLeaveTypesBalance(Request $request){
        $user_id = $request->user_id ?? auth()->id();

        return LeaveBalance::with('leaveType:id,name,slug')->where('user_id', $user_id)->latest()->get();
    }

    public function diffBetweenDays(Request $request)
    {
        $start = $request->start;
        $end = $request->end;

        return sumDaysBetweenDates($start, $end);
    }















    public function contactMessages()
    {
        $messages = ContactMessage::latest()->paginate(10);

        return inertia('Admin/Others/Messages', [
            'messages' => $messages,
        ]);
    }

    public function contactMessageDelete(ContactMessage $message)
    {
        $message->delete();

        session()->flash('success', 'Message deleted successfully.');
        return back();
    }

    public function notifications()
    {
        return inertia('Notifications', [
            'notifications' => auth()->user()->notifications,
        ]);
    }

    public function getTranslatedMessage(Request $request)
    {
        return __($request->message);
    }

    public function error403()
    {
        return inertia('Errors/403');
    }

    public function allCountries()
    {
        return Country::all(['id', 'name']);
    }

    public function allTeamSizes()
    {
        return TeamSize::all(['id', 'name']);
    }

    public function appSetting()
    {
        return setting();
    }

    public function useridWiseOrganization(Request $request)
    {
        return getOrganization($request->user_id);
    }

    public function switchLanguage($language)
    {
        session()->put('current_lang', $language);

        return back();
    }

    public function markAsReadNotification()
    {
        auth()->user()->unreadNotifications->markAsRead();
    }

    public function fetchOrganizationsLeaveTypes($organization_id)
    {
        $leave_types = LeaveType::with(['leaveBalances' => function($q){
            $q->where('employee_id', currentEmployee('id'));
        }])->where('organization_id', $organization_id)
        ->get()
        ->transform(function ($data) {
            $data->remaining_days = $data->leaveBalances[0]->remaining_days;
            $data->used_days = $data->leaveBalances[0]->used_days;
            return $data;
        });

        return response()->json($leave_types);
    }
}
