<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\Role\RoleCreateRequest;
use App\Http\Requests\Admin\Setting\Role\RoleUpdateRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        // abort_if(!userCan('roles.index'), 403);
        $roles = Role::with('permissions')->get();

        return inertia('Admin/Setting/Roles/Index', compact('roles'));
    }

    public function create()
    {
        // abort_if(!userCan('roles.create'), 403);

        $permissions = Permission::get()->groupBy('group_name');

        return inertia('Admin/Role/Create', compact('permissions'));
    }

    public function store(RoleCreateRequest $request)
    {
        // abort_if(!userCan('roles.store'), 403);

        $role = Role::create([
            'name' => ucfirst($request->name),
            'guard_name' => 'web',
            'color' => $request->color,
            'description' => $request->description,
        ]);
        $role->syncPermissions($request->role_permissions);

        $this->flashSuccess('Role created successfully');
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

    public function update(RoleUpdateRequest $request, Role $role)
    {
        // abort_if(!userCan('roles.update'), 403);
        $role->update([
            'name' => ucfirst($request->name),
            'color' => $request->color,
            'description' => $request->description,
        ]);
        $role->syncPermissions($request->role_permissions);

        $this->flashSuccess('Role updated successfully');
        return back();
    }

    public function destroy(Role $role)
    {
        // abort_if(!userCan('roles.destroy'), 403);

        $role->delete();

        $this->flashSuccess('Role deleted successfully');
        return back();
    }
}
