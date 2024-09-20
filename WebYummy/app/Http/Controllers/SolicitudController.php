<?php

namespace App\Http\Controllers;

use App\Models\User; // Importar el modelo User
use App\Models\Restaurant; // Importar el modelo Restaurant
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SolicitudController extends Controller
{
    public function index()
    {
        return view('solicitudRestaurante.notificacion');
    }

    public function create()
    {
        return view('solicitudRestaurante.Solicitud');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'password' => 'required|string|confirmed|min:8',
            'nombre_negocio' => 'required|string|max:255',
            'categoria' => 'required|string|max:50',
            'hora_apertura' => 'required',
            'hora_cierre' => 'required',
        ]);

        // Crear un nuevo usuario
        $user = User::create([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'password' => Hash::make($request->password),
            'tipo' => 'restaurante',
        ]);

        // Crear un nuevo restaurante relacionado con el usuario
        Restaurant::create([
            'user_id' => $user->id,
            'nombre' => $request->nombre_negocio,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'horario' => $request->hora_apertura . ' - ' . $request->hora_cierre,
            'estado' => 'activo',
            'categoria' => $request->categoria,
        ]);

        return redirect()->route('solicitudRestaurante.notificacion')->with('success', 'Restaurante registrado con éxito');
    }
}
