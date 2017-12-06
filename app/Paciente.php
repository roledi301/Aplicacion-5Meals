<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Observacion;
use Carbon\Carbon;
use App\Dieta;
use App\Entrenamiento;
class Paciente extends Model
{
    protected $fillable = [
        'nombre','apellidos', 'fecha_nacimiento', 'sexo','nhusa','altura','actividad_fisica','patologias'
    ];
    public function observaciones()
    {
        return $this->hasMany('App\Observacion');
    }
    public function dietas()
    {
        return $this->hasMany('App\Dieta');
    }
    public function entrenamientos()
    {
        return $this->hasMany('App\Entrenamiento');
    }
    public function getEdadAttribute(){
        $fecha_nac = strtotime($this->fecha_nacimiento);
        $edad = date('Y', $fecha_nac);
        if (($mes = (date('m') - date('m', $fecha_nac))) < 0) {
            $edad++;
        } elseif ($mes == 0 && date('d') - date('d', $fecha_nac) < 0) {
            $edad++;
        }
        return date('Y') - $edad;
    }
    public function scopeName($query, $apellidos){
        if(trim($apellidos)!=""){
            $query->where('apellidos',"LIKE","%$apellidos%");
        }
    }
}
