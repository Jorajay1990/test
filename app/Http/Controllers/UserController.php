<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    /**
     * Display a listing of users.
     */
    public function index()
    {
        $users = User::all(); // O la consulta que estés usando
        $roles = Role::all(); // Obtén todos los roles disponibles

        return view('users.index', compact('users', 'roles')); // Pasa ambas variables a la vista
    }

    public function edit(User $user)
    {
        // Obtén todos los roles para la vista
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    public function updateRole(Request $request, $userId)
    {
        // Validar que el role_id enviado sea un valor válido
        $validator = Validator::make($request->all(), [
            'role_id' => 'required|exists:roles,id',
        ], [
            'role_id.required' => 'El campo rol es obligatorio.',
            'role_id.exists' => 'Seleccione un rol válido.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Obtener el usuario y actualizar el rol
        $user = User::findOrFail($userId);
        $user->role_id = $request->input('role_id');
        $user->save();

        // Redirigir con un mensaje de éxito
        return redirect()->route('users.index')->with('success', 'Rol actualizado exitosamente.');
    }

    //
    public function createUsers()
    {
        // URL de la API pública
        $url = 'https://reqres.in/api/users?page=1';

        // Hacer la solicitud HTTP GET a la API
        $response = Http::get($url);

        // Decodificar la respuesta JSON
        $users = $response->json()['data'];

        // Iterar sobre los usuarios y guardarlos en la base de datos
        foreach ($users as $userData) {
            User::updateOrCreate(
                ['email' => $userData['email']], // Condición para evitar duplicados
                [
                    'name' => $userData['first_name'] . ' ' . $userData['last_name'],
                    'email' => $userData['email'],
                    'password' => bcrypt('default_password'), // Contraseña por defecto
                    'role_id'   => 1
                ]
            );
        }

        return response()->json([
            'message' => 'Usuarios creados o actualizados correctamente',
            'data' => $users
        ]);
    }

}
