<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;
    protected $table='historial'; 
    public $timestamps=true; 
    protected $fillable=[
        'id_paciente',
        'trata_medic',
        'propen_hemo',
        'alergico',
        'hipertenso',
        'diabetico',
        'embarazada',
        'motivo_consul',
        'diagnostico',
        'observacion',
        'referido'
    ]; 
    protected $guarded=['id']; 
    protected $hidden=['created_at','updated_at'];
    public function scopeBuscar($query,$dato)
    {
        return $query->where('NumDoc','LIKE',"%$dato%")->orWhere('name','LIKE',"%$dato%");
    }
}
