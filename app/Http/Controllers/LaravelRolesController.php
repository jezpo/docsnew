<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;


class LaravelRolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('pages.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('pages.roles.create');
    }

    public function store(Request $request)
    {
        // Validación y creación de rol
    }

    public function edit(Role $role)
    {
        return view('pages.roles.edit', compact('role'));
    }

    public function update(Request $request, Role $role)
    {
        // Validación y actualización de rol
    }

    public function destroy(Role $role)
    {
        // Eliminación de rol
    }
}
