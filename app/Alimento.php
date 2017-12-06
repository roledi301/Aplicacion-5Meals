<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Etiqueta;
use App\Dieta;

class Alimento extends Model
{
    protected $fillable = [
        'nombre','kcal','grasas','proteinas','carbohidratos','observacion'
    ];
    public function dietas()
    {
        return $this->belongsToMany('App\Dieta');
    }
    public function scopeName($query, $nombre){
        if(trim($nombre)!=""){
            $query->where('nombre',"LIKE","%$nombre%");
        }
    }
}
