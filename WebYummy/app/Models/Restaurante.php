<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurante extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'horario', // Asegúrate de que estos sean los campos correctos
        // Agrega más campos según tu tabla
    ];
}
