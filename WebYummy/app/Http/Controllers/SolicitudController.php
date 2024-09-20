<?php

namespace App\Http\Controllers;

use App\Models\User; // Importar el modelo User
use App\Models\Restaurante; // Importar el modelo Restaurante
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Importar Hash para encriptar contraseñas

class SolicitudController extends Controller
{
    /**
     * Muestra una lista de solicitudes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('solicitudRestaurante.index');
    }

    /**
     * Muestra el formulario para crear una nueva solicitud de restaurante.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('solicitudRestaurante.create');
    }

    /**
     * Almacena una nueva solicitud en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email', // Verifica que el email sea único en la tabla users
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
            'password' => 'required|string|confirmed|min:8', // confirmed requiere un campo `password_confirmation`
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
            'password' => Hash::make($request->password), // Encriptar la contraseña
            'tipo' => 'restaurante', // Asignar tipo de usuario
        ]);

        // Crear un nuevo restaurante relacionado con el usuario
        $restaurante = Restaurante::create([
            'user_id' => $user->id, // Relacionar el restaurante con el usuario creado
            'horario' => $request->hora_apertura, // Guardar solo el horario, puedes ajustar esto según tu modelo
            // Agregar más campos según tu modelo si es necesario
        ]);

        // Redirigir o mostrar un mensaje de éxito
        return redirect()->route('restaurante.index')->with('success', 'Restaurante registrado con éxito');
    }

    /**
     * Muestra una solicitud específica.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function show(Solicitud $solicitud)
    {
        // Lógica para mostrar una solicitud específica (opcional)
    }

    /**
     * Muestra el formulario para editar una solicitud.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function edit(Solicitud $solicitud)
    {
        // Lógica para editar una solicitud específica (opcional)
    }

    /**
     * Actualiza una solicitud en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solicitud $solicitud)
    {
        // Lógica para actualizar una solicitud (opcional)
    }

    /**
     * Elimina una solicitud de la base de datos.
     *
     * @param  \App\Models\Solicitud  $solicitud
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solicitud $solicitud)
    {
        // Lógica para eliminar una solicitud (opcional)
    }
}
