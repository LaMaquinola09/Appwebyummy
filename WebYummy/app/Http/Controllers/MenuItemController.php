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
        try {
            $request->validate([
                'nombre_producto' => 'required|string|max:255',
                'descripcion' => 'required|string',
                'precio' => 'required|numeric',
                'imagen_url' => 'required|url',
                'restaurante_id' => 'required|exists:restaurantes,id',
            ]);
    
            MenuItem::create($request->all());
    
            return redirect()->route('platos.index')->with('success', 'Plato creado con éxito');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors())->withInput();
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
