<?php

namespace App\Http\Controllers;

use App\Models\MenuItem; // Asegúrate de importar el modelo
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $platos = MenuItem::all(); // Obtener todos los platos
        return view('menu.index', ['platos' => $platos, 'restaurante_id' => 1]); // Cambia 1 por el ID real del restaurante
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menu.create', ['restaurante_id' => 1]); // Cambia 1 por el ID real del restaurante
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'nombre_producto.required' => 'El nombre del plato es obligatorio.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'precio.required' => 'El precio es obligatorio.',
            'imagen_url.required' => 'La URL de la imagen es obligatoria.',
            'imagen_url.url' => 'La URL de la imagen debe ser válida.',
            'restaurante_id.required' => 'El ID del restaurante es obligatorio.',
            'restaurante_id.exists' => 'El ID del restaurante debe existir en la base de datos.',
        ];

        try {
            $request->validate([
                'nombre_producto' => 'required|string|max:255',
                'descripcion' => 'required|string',
                'precio' => 'required|numeric',
                'imagen_url' => 'required|url',
                'restaurante_id' => 'required|exists:restaurantes,id',
            ], $messages);
    
            MenuItem::create($request->all());
    
            return redirect()->route('platos.index')->with('success', 'Plato creado con éxito');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Manejo de errores
            return redirect()->back()
                ->withErrors($e->validator->errors())
                ->withInput()
                ->with('error', 'Por favor, corrige los errores a continuación.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Métodos restantes para mostrar, editar y eliminar platos

    public function show($id)
    {
        // Lógica para mostrar un plato específico si es necesario
    }

    public function edit($id)
    {
        // Lógica para editar un plato específico si es necesario
    }

    public function update(Request $request, $id)
    {
        // Lógica para actualizar un plato específico si es necesario
    }

    public function destroy($id)
    {
        // Lógica para eliminar un plato específico si es necesario
    }
}
