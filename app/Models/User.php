<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'TipoDoc','NumDoc','name', 'email', 'password','Rol','Estado','Foto','Telefono','IdMedico'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    public $timestamps=true;
    protected $guarded=['id'];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function scopeBuscar($query,$dato)
    {
        return $query->where('name','LIKE',"%$dato%")->orWhere('NumDoc','LIKE',"%$dato%");
    }
    public function scopeBuscarId($query,$dato)
    {
        return $query->where('id',$dato);
    }

}
