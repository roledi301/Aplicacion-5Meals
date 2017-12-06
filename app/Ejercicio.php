<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Entrenamiento;
class Ejercicio extends Model
{
    public function entrenamientos()
    {
        return $this->belongsToMany('App\Entrenamiento')->withTimestamps();
    }
    protected $fillable = [
        'nombre','duracion','calorias'
    ];

    public function scopeName($query, $nombre){
        if(trim($nombre)!=""){
            $query->where('nombre',"LIKE","%$nombre%");
        }
    }
}
