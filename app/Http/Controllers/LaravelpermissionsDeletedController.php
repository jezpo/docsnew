<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;

class LaravelpermissionsDeletedController extends Controller
{
    public function index()
    {
        $deletedPermissions = Permission::onlyTrashed()->get();
        return view('permissions.deleted', compact('deletedPermissions'));
    }

    public function restore($id)
    {
        $permission = Permission::withTrashed()->findOrFail($id);
        $permission->restore();
        return redirect()->route('pages.permisos.index')->with('success', 'Permiso restaurado correctamente');
    }

    public function destroy(Permission $permission)
    {
        $permission->forceDelete();
        return redirect()->route('pages.permisos.index')->with('success', 'Permiso eliminado permanentemente');
    }
}
