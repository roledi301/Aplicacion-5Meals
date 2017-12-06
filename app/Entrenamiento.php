<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Paciente;
use App\Ejercicio;
class Entrenamiento extends Model
{
    protected $fillable = ['descripcion'];

    public function pacientes()
    {
        return $this->belongsTo('App\Paciente');
    }
    public function ejercicios()
    {
        return $this->belongsToMany('App\Ejercicio')->withPivot('comentario','repeticion','dia_semana')->withTimestamps();
    }
}
    /*public function getDuracionAttribute($entrenamiento)
    {
        $ejercicios=$entrenamiento->ejercicios();
        $sum=0;
        foreach($ejercicios as $e){
           $e=(int)$e->duracion;
            $sum += $e->duracion;
        }
        return $sum;
    }*/


