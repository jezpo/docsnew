<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role; // Importa el modelo Role de Spatie

class RoleController extends Controller
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
        // Validate the form data
        $request->validate([
            'name' => 'required|unique:roles|max:255',
        ]);

        // Create the role
        $role = Role::create(['name' => $request->name]);

        // Assign permissions based on role name
        switch ($role->name) {
            case 'super admin':
                // Assign all permissions to super admin
                $role->givePermissionTo(['create', 'read', 'update', 'delete']);
                break;
            case 'write':
                // Assign permissions for write role
                $role->givePermissionTo(['create', 'update']);
                break;
            case 'reader':
                // Assign permissions for reader role
                $role->givePermissionTo('read');
                break;
            default:
                // Default permissions if role name is not recognized
                $role->givePermissionTo('read');
                break;
        }

        // Redirect to the index page with success message
        return redirect()->route('pages.roles.index')->with('success', 'Role created successfully');
    }
}