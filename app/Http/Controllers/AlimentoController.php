<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Alimento;
use App\Etiqueta;
class AlimentoController extends Controller
{
    public function index(Request $request)
    {
        $alimentos=Alimento::name($request->get('nombre'))->orderBy('nombre','ASC')->paginate();
        return view('Alimento/index',compact('alimentos'));
    }
    public function create()
    {
        return view('Alimento/crear');
    }
    public function store(Request $request)
    {
        $this-> validate($request,
            ['nombre'=>'required', 'kcal'=>'required']);
        $alimento = new Alimento();
        $alimento->nombre = $request->nombre;
        $alimento->kcal = $request->kcal;
        $alimento->grasas = $request->grasas;
        $alimento->proteinas=$request->proteinas;
        $alimento->carbohidratos=$request->carbohidratos;
        $alimento->observacion=$request->observacion;
        $alimento->save();
        if($alimento->save()){
            return redirect('alimentos')->with('msj','Se ha registrado el alimento correctamente');
        }else{
            return back()->with('nmsj','No se ha registrado el alimento correctamente');
        }
    }
    public function edit($id)
    {
        $alimento = Alimento::find($id);
        return view ('Alimento/editar',compact('alimento'));
    }

    public function update(Request $request, $id)
    {
        $this-> validate($request,
            ['nombre'=>'required', 'kcal'=>'required' ]);

        $alimento = Alimento::find($id);
        $alimento->nombre = $request->nombre;
        $alimento->kcal = $request->kcal;
        $alimento->grasas = $request->grasas;
        $alimento->proteinas=$request->proteinas;
        $alimento->carbohidratos=$request->carbohidratos;
        $alimento->observacion=$request->observacion;
        $alimento->save();
        if($alimento->save()){
            return redirect('alimentos');
        }else{
            return back()->with('nmsj','No se ha actualizado el alimento correctamente');
        }
    }
    public function destroy($id)
    {
        Alimento::destroy($id);
        return back();
    }
}
