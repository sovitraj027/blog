<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{


 public function index()
    {
      
        $roles = Role::all();
        return view('admin.role.default',compact('roles'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(Request $request)
    {
        try {
            Role::create(['name' => $request->name]);
            return redirect()->route('roles.index')->with('success', 'Role created successfully');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }

    public function edit($id)
    {
        $role = Role::with('permissions')->whereId($id)->firstOrFail();
        return view('admin.role.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $permissions = $request->except('_token', '_method');
        $arrayPermissions = [];
        foreach ($permissions as $key => $value) {
            if ($value == "on")
                array_push($arrayPermissions, $key);
        }
        $role = Role::findOrFail($id);
        $role->syncPermissions($arrayPermissions);
        return redirect()->route('roles.index')->with('info', 'Role Permission updated successfully');
    }

    public function destroy($role_id)
    {
        try {
            $role = Role::where('id', $role_id)->first();
            DB::table('role_has_permissions')->where('role_id', $role_id)->delete();
            $role->delete();
            return redirect()->back()->with('error', 'Role deleted successfully');
        } catch (\Exception $e) {
            ($e->getMessage());
        }
    }
}