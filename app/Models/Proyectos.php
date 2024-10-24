<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyectos extends Model
{
    protected $table = 'proyectos';
    public $timestamps = false; // Desactiva el guardado de las fechas de creación y actualización por defecto
}