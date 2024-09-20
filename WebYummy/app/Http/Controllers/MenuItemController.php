<?php

namespace App\Http\Controllers;

use App\Models\MenuItem; 
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        $platos = MenuItem::all(); // Obtener todos los platos
        return view('menu.index', ['platos' => $platos, 'restaurante_id' => 1]);
    }

    public function create()
    {
        return view('menu.create', ['restaurante_id' => 1]);
    }

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

    public function show($id) { /* ... */ }
    public function edit($id) { /* ... */ }
    public function update(Request $request, $id) { /* ... */ }
    public function destroy($id) { /* ... */ }
}
