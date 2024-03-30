<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
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
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|unique:permissions|max:255',
        ]);

        // Crear el permiso
        Permission::create(['name' => $request->name]);

        // Redirigir a la página de índice con un mensaje de éxito
        return redirect()->route('pages.permisos.index')->with('success', 'Permiso creado correctamente');
    }

    public function destroy($id)
    {
        // Encontrar el permiso por su ID
        $permission = Permission::findOrFail($id);
        
        // Eliminar el permiso
        $permission->delete();

        // Redirigir de vuelta a la página de índice con un mensaje de éxito
        return redirect()->route('pages.permisos.index')->with('success', 'Permiso eliminado correctamente');
    }
}