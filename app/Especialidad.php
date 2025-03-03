<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table='especialidad'; // nombre de la tabla
    public $timestamps=true; // created_at y updated_at sean automaticos
    protected $fillable=['Descripcion']; // campos de la tabla para insertar, editar, etc
    protected $guarded=['id']; // la llave primaria
    protected $hidden=['created_at','updated_at']; // fechas de creacion y de modificion

    // funcion para buscar con filtros --> sirve para hacer paginacion
    public function scopeBuscar($query,$dato)
    {
        return $query->where('Descripcion','LIKE',"%$dato%");
    }

    
}
