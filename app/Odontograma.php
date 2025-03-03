<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Odontograma extends Model
{
	protected $table='odontograma'; 
	public $timestamps=true; 
	protected $fillable=[
		'fecha',
		'id_paciente',
	    'num_diente',
	    'lado',
	    'accion',
	    'simbolo',
	    'id_tratamiento',
	    'descripcion',
	    'id_usuario'
	    ]; 
	protected $guarded=['id']; 
	protected $hidden=['created_at','updated_at']; 
}
