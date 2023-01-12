<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DepartmentCreateRequest;
use App\Http\Requests\Admin\DepartmentUpdateRequest;
use App\Services\Admin\Department\CreateDepartmentService;
use App\Services\Admin\Department\DeleteDepartmentService;
use App\Services\Admin\Department\UpdateDepartmentService;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Department::query();

        if($request->has('keyword') && $request->filled('keyword')){
            $query->whereLike('name', $request->keyword);
        }

        $departments = $query->latest()->paginate(20)->withQueryString();

        return inertia('Admin/Department/Index',[
            'departments' => $departments,
            'filter' => $request
        ]);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  DepartmentCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentCreateRequest $request)
    {
        (new CreateDepartmentService())->execute($request);

        $this->flashSuccess('Department created successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DepartmentUpdateRequest  $request
     * @param Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentUpdateRequest $request, Department $department)
    {
        (new UpdateDepartmentService())->execute($request,$department);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        (new DeleteDepartmentService())->execute($department);

        $this->flashSuccess('Department deleted successfully');
        return back();
    }
}
