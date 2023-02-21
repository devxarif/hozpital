<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        // abort_if(!userCan('roles.index'), 403);

        $roles = Role::with('permissions')->paginate(10);
        $permissions = Permission::get()->groupBy('group_name');

        return inertia('Admin/Role/Index', compact('roles', 'permissions'));
    }

    public function create()
    {
        // abort_if(!userCan('roles.create'), 403);

        $permissions = Permission::get()->groupBy('group_name');

        return inertia('Admin/Role/Create', compact('permissions'));
    }

    public function store(Request $request)
    {
        // abort_if(!userCan('roles.store'), 403);

        $request->validate([
            'name' => 'required|unique:roles,name',
            'role_permissions' => 'required|array',
            'color' => 'required',
            'description' => 'required',
        ], [
            'role_permissions.required' => 'The permissions field is required',
        ]);

        $role = Role::create([
            'name' => ucfirst($request->name),
            'guard_name' => 'web',
            'color' => $request->color,
            'description' => $request->description,
        ]);
        $role->syncPermissions($request->role_permissions);

        session()->flash('success', 'Role created successfully');

        return back();
    }

    public function edit(Role $role)
    {
        // abort_if(!userCan('roles.edit'), 403);

        $role->permissions;
        $permissions = Permission::get()->groupBy('group_name');

        return [
            'role' => $role,
            'permissions' => $permissions,
        ];
    }

    public function update(Request $request, Role $role)
    {
        // abort_if(!userCan('roles.update'), 403);

        $request->validate([
            'name' => 'required|unique:roles,name,'.$role->id,
            'role_permissions' => 'required|array',
            'color' => 'required',
            'description' => 'required',
        ]);

        $role->update(['name' => ucfirst($request->name)]);
        $role->syncPermissions($request->role_permissions);

        session()->flash('success', 'Role updated successfully');

        return back();
    }

    public function destroy(Role $role)
    {
        // abort_if(!userCan('roles.destroy'), 403);

        $role->delete();

        session()->flash('success', 'Role deleted successfully');

        return back();
    }
}
