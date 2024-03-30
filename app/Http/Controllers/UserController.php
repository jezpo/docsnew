<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Verificar si el usuario ya existe
        $existingUser = User::where('email', $request->input('email'))->first();
        if ($existingUser) {
            return redirect()->back()->with('error', 'El usuario ya existe');
        }

        // Crear un nuevo usuario
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password')); // Hashear la contraseña
        $user->save();

        // Asignar el rol de super admin al nuevo usuario
        $superAdminRole = Role::findByName('super-admin');
        $user->assignRole($superAdminRole);

        // Asignar los permisos de write y view al rol de super admin
        $writePermission = Permission::findOrCreate('write');
        $viewPermission = Permission::findOrCreate('view');
        $superAdminRole->syncPermissions([$writePermission, $viewPermission]);

        // Si el correo y la contraseña son los predeterminados, se redirige a una página específica
        if ($user->email === 'demo@gmail.com' && $request->input('password') === '12345678') {
            return redirect()->route('home')->with('success', 'Super Admin creado exitosamente con las credenciales predeterminadas');
        }

        // Redirigir a una página de éxito o mostrar un mensaje
        return redirect()->route('pages/usuarios/index')->with('success', 'Usuario creado exitosamente con el rol de Super Admin y permisos asignados');
    }
    public function create()
    {
        $users = User::all(); // Obtener todos los usuarios desde la base de datos
        return view('pages/usuarios.index', compact('users'));
    }
    public function edit($id)
    {
        // Obtener el usuario con el ID proporcionado
        $user = User::findOrFail($id);
        
        // Devolver la vista de edición con los datos del usuario
        return view('pages/usuarios.edit', compact('user'));
    }

    public function destroy($id)
    {
        // Obtener el usuario con el ID proporcionado
        $user = User::findOrFail($id);
        
        // Eliminar el usuario
        $user->delete();

        // Redirigir de vuelta con un mensaje de éxito
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado correctamente');
    }
}
