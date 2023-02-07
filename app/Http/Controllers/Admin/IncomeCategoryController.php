<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IncomeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = LeaveType::query();

        if($request->has('keyword') && $request->filled('keyword')){
            $query->whereLike(['name'],  $request->keyword);
        }

        $leave_types = $query->latest()->paginate(20)->withQueryString();

        return inertia('Admin/LeaveType/Index', [
            'leave_types' => $leave_types,
            'filter' => $request
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LeaveTypeCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeaveTypeCreateRequest $request)
    {
        (new CreateLeaveTypeService())->execute($request);

        $this->flashSuccess('Leave type created successfully!');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LeaveTypeUpdateRequest $request
     * @param  LeaveType $leaveType
     * @return \Illuminate\Http\Response
     */
    public function update(LeaveTypeUpdateRequest $request, LeaveType $leaveType)
    {
        (new UpdateLeaveTypeService())->execute($request, $leaveType);

        $this->flashSuccess('Leave type updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  LeaveType $leaveType
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveType $leaveType)
    {
        $leaveType->delete();

        $this->flashSuccess('Leave type deleted successfully!');
        return back();
    }
}
