<?php

namespace App\Http\Controllers;

use App\Observacion;
use App\Paciente;
use Illuminate\Http\Request;

class ObservacionController extends Controller
{

    public function index()
    {
        //Se sustituye por showObservaciones de Paciente

    }

    public function create()
    {
        //
        //return view('Observacion/crear');
    }

    public function store(Request $request)
    {
        /*//Guardar en la BD
        $observacion=new Observacion();
        /*$observacion->paciente_id =$paciente_id;
        $observacion->peso = $request->peso;
        $observacion->grasa = $request->grasa;
        $observacion->brazo=$request->brazo;
        $observacion->muñeca=$request->muñeca;
        $observacion->pliegues=$request->pliegues;
        $observacion->cintura=$request->cintura;
        $observacion->cadera=$request->cadera;
        $observacion->muslo=$request->muslo;
        $observacion->pantorrilla=$request->pantorrilla;

        $observacion->save();

        if($observacion->save()){
            return redirect('Observacion/index')->with('msj','Nueva observación registrada correctamente');
        }else{
            return back()->with('nmsj','No se ha reggistrado la observacion');
        }*/
    }

    public function show($id)
    {
        //
        $observacion=Observacion::find($id);
        return view('Observacion/detalle',['observacion'=>$observacion]);
    }

    public function edit($id)
    {
        //
        $observacion = Observacion::find($id);
        return view('Observacion/editar')->with(['observacion'=>$observacion]);

    }

    public function update(Request $request, $id)
    {
        //LA FK DE PACIENTE NO SE ACTUALIZA
        $observacion=Observacion::find($id);
        $observacion->peso = $request->peso;
        $observacion->masaGrasa = $request->masaGrasa;
        $observacion->brazo=$request->brazo;
        $observacion->muñeca=$request->muñeca;
        $observacion->plieguesAbdominales=$request->plieguesAbdominales;
        $observacion->cintura=$request->cintura;
        $observacion->cadera=$request->cadera;
        $observacion->muslo=$request->muslo;
        $observacion->gemelarMedio=$request->gemelarMedio;
        $observacion->save();
        $paciente_id= $observacion->paciente_id;

        if($observacion->save()){
            return redirect()->route('observaciones.show',['id'=>$observacion->id]);
        }else{
            return back()->with('nmsj','No se ha actualizado la modificación');
        }
    }

    public function destroy()
    {
    }
    public function destroy2($id, $paciente_id)
    {
        $paciente=Paciente::find($paciente_id);
        $observaciones=$paciente->observaciones()->get();
        if(count($observaciones)==1){
            Observacion::destroy($id);
            return view('Observacion/crear',['paciente_id'=>$paciente_id]);
        }else {
            Observacion::destroy($id);
            return back();
        }
    }
}
