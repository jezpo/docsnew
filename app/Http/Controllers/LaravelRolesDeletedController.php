<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class LaravelRolesDeletedController extends Controller
{
    public function index()
    {
        $deletedRoles = Role::onlyTrashed()->get();
        return view('roles.deleted', compact('deletedRoles'));
    }

    public function restore($id)
    {
        $role = Role::withTrashed()->findOrFail($id);
        $role->restore();
        return redirect()->route('pages.roles.index')->with('success', 'Rol restaurado correctamente');
    }

    public function destroy(Role $role)
    {
        $role->forceDelete();
        return redirect()->route('pages.roles.index')->with('success', 'Rol eliminado permanentemente');
    }
}
