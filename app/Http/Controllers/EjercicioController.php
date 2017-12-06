<?php

namespace App\Http\Controllers;

use App\Ejercicio;
use Illuminate\Http\Request;

class EjercicioController extends Controller
{
    public function index(Request $request)
    {
        $ejercicios=Ejercicio::name($request->get('nombre'))->orderBy('nombre','ASC')->paginate();
        return view('Ejercicio/index', compact('ejercicios'));
    }
    public function create() { return view('Ejercicio/crear');  }
    public function store(Request $request)
    {
        $this-> validate($request,['nombre'=>'required' ]);
        $ejercicio = new Ejercicio();
        $ejercicio-> nombre = $request->nombre;
        $ejercicio->calorias = $request->calorias;
        $ejercicio->duracion = $request->duracion;
        $ejercicio->save();
        if($ejercicio->save()){
            return redirect('ejercicios');
        }else{
            return back()->with('nmsj','No se ha registrado el ejercicio correctamente');
        }
    }


    public function show($id)
    {
    }
    public function edit($id)
    {
        $ejercicio = Ejercicio::find($id);
        return view ('Ejercicio/editar')->with(['ejercicio'=>$ejercicio]);
    }

    public function update(Request $request, $id)
    {
        $this-> validate($request,['nombre'=>'required']);
        $ejercicio = Ejercicio::find($id);
        $ejercicio-> nombre = $request->nombre;
        $ejercicio->calorias = $request->calorias;
        $ejercicio->duracion = $request->duracion;
        $ejercicio->save();
        if($ejercicio->save()){
            return redirect('ejercicios');
        }else{
            return back()->with('nmsj','No se ha actualizado el ejercicio');
        }
    }
    public function destroy($id)
    {
        Ejercicio::destroy($id);
        return back();
    }
}
