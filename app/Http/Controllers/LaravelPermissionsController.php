<?php

namespace App\Http\Controllers;
use App\Models\Permission;
use Illuminate\Http\Request;

class LaravelPermissionsController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        return view('pages.permisos.index', compact('permissions'));
    }

    public function create()
    {
        return view('pages.permisos.create');
    }

    public function store(Request $request)
    {
        // Validación y creación de permiso
    }

    public function edit(Permission $permission)
    {
        return view('pages.permisos.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        // Validación y actualización de permiso
    }

    public function destroy(Permission $permission)
    {
        // Eliminación de permiso
    }
}
