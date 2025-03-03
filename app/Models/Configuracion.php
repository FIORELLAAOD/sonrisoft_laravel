<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    use HasFactory;
    protected $table='accion'; 
    public $timestamps=true; 
    protected $fillable=[
        'nombre',
        'color'
    ]; 
    protected $guarded=['id']; 
    protected $hidden=['created_at','updated_at'];
}
