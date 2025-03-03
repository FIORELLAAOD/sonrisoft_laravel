<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
	protected $table='pago'; 
	public $timestamps=true; 
	protected $fillable=[
		'IdCita',
	    'Monto',
	    'IdUsuario'
	    ]; 
	protected $guarded=['id']; 
	protected $hidden=['created_at','updated_at']; 

	public function scopeBuscar($query,$dato)
	{
	    return $query->where('Monto','LIKE',"%$dato%");
	}
}
