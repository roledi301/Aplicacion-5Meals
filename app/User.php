<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Paciente;
use App\Alimento;
use App\Ejercicio;
use App\Role;
class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password','role_id'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function rol()
    {
        return $this->belongsTo('App\Role');
    }
    public function scopeName($query, $nombre){
        if(trim($nombre)!=""){
            $query->where('name',"LIKE","%$nombre%");
        }
    }
}
