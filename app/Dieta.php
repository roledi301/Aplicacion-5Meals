<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Paciente;
use App\Alimento;
class Dieta extends Model
{
    protected $fillable = [
        'nombre','duracion','kcal','descripcion',
    ];
    public function pacientes()
    {
        return $this->belongsTo('App\Paciente');
    }
    public function alimentos()
    {
        return $this->belongsToMany('App\Alimento')->withPivot('dia_semana','cantidad','momento','comentario')->withTimestamps();
    }
}
