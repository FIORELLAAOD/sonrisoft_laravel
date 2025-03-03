<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;
    protected $table='users'; 
    public $timestamps=true; 
    protected $fillable=[
        'TipoDoc',
        'NumDoc',
        'name',
        'email',
        'password',
        'Rol',
        'Estado',
        'Foto',
        'Telefono',
        'IdMedico'
    ]; 
    protected $guarded=['id']; 
    protected $hidden=['created_at','updated_at'];
    public function scopeBuscar($query,$dato)
    {
        return $query->where('NumDoc','LIKE',"%$dato%")->orWhere('name','LIKE',"%$dato%");
    }
}
