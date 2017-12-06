<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
    protected $fillable = [
        'peso','masagrasa','brazo','muñeca','plieguesAbdominales','cintura','cadera','muslo','gemelarMedio'
    ];
    public function paciente()
    {
        return $this->belongsTo('App\Paciente');
    }
    public function getAlturaAttribute($paciente_id)
    {
        $paciente=Paciente::find($paciente_id);
        return $paciente->altura;
    }
    public function getActividadAttribute($paciente_id)
    {
        $paciente=Paciente::find($paciente_id);
        return $paciente->actividad_fisica;
    }
    public function getImcAttribute($paciente_id)
    {
        $paciente=Paciente::find($paciente_id);
        return $this->peso/ pow($paciente->altura,2);
    }
    public function getTmrAttribute($paciente_id){
        $paciente=Paciente::find($paciente_id);
        if( $paciente->sexo=="hombre" ){
            return (66.4730+((13.751*$this->peso)+(5.0033*($paciente->altura*100))-(6.755*$paciente->getEdadAttribute())))
        ;}
        elseif($paciente->sexo=="mujer" ){
            return (655.0955+(9.463*$this->peso)+(1.8496*($paciente->altura*100))-(4.6756*$paciente->getEdadAttribute()));
        }
    }
    public function getAfAttribute($paciente_id)
    {
        $paciente=Paciente::find($paciente_id);
        if($paciente->sexo=="hombre" and $paciente->actividad_fisica=="ligera"){
            return 1.55;}
        elseif($paciente->sexo=="hombre" and $paciente->actividad_fisica=="moderada"){
            return 1.78;}
        elseif($paciente->sexo=="hombre" and $paciente->actividad_fisica=="elevada"){
            return 2.10;}
        elseif($paciente->sexo=="mujer" and $paciente->actividad_fisica=="ligera"){
            return 1.56;}
        elseif($paciente->sexo=="Mujer" and $paciente->actividad_fisica=="Moderada"){
            return 1.64;}
        else{
            return 1.82;}
    }
    public function getGetAttribute($paciente_id){
        return ($this->getTmrAttribute($paciente_id)*$this->getAfAttribute($paciente_id));
    }
}
