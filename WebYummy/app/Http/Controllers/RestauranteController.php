<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RestauranteController extends Controller
{
    public function index()
    {
        // Retorna la vista para los restaurantes
        return view('restaurantes.index');
    }
}
