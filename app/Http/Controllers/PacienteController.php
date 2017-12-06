<?php

namespace App\Http\Controllers;

use App\Dieta;
use App\Ejercicio;
use App\Entrenamiento;
use App\Observacion;
use App\Paciente;
use App\Alimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PacienteController extends Controller
{
    //DIETAS
    public function createDieta($paciente_id)
    {
        $paciente=Paciente::find($paciente_id);
        $alimentos=Alimento::all();
        return view('Dieta/crear')->withAlimentos($alimentos)->withPaciente_id($paciente_id)->withPaciente($paciente);
    }
    public function storeDieta(Request $request, $paciente_id)
    {
        $this-> validate($request,
            ['nombre'=>'required', 'kcal'=>'required', 'duracion'=>'required']);
        $dieta=new Dieta();
        $dieta->nombre=$request->nombre;
        $dieta->descripcion=$request->descripcion;
        $dieta->kcal=$request->kcal;
        $dieta->duracion=$request->duracion;
        $dieta->paciente_id =$paciente_id;
        $dieta->save();

        $alimentos=$request->alimentos;
        $comentario=$request->comentario;
        $cantidad=$request->cantidad;
        $dia_semana=$request->dia_semana;
        $momento=$request->momento;
        for($a=0;$a<sizeof($alimentos);$a++){
            $dieta->alimentos()->attach($alimentos[$a],['comentario'=>$comentario[$a],'cantidad'=>$cantidad[$a],'dia_semana'=>$dia_semana[$a],
            'momento'=>$momento[$a]]);
          /*  Storage::disk('local')->append('file.txt',);*/
        }
        $dieta->save();
        if($dieta->save()){
            return redirect()->route('dietas.show',['id'=>$dieta->id]);
        }else{
            return back()->with(flash('Dieta no creada'));
        }
    }
    public function indexDietas($id)
    {
        $paciente=Paciente::find($id);
        $dietas=$paciente->dietas()->get();
        $dietas=$dietas->sortByDesc('created_at');
        return view('Dieta/index')->with(['dietas'=>$dietas, 'paciente'=>$paciente,'paciente_id'=>$id]);
    }

    //ENTRENAMIENTOS
    public function createEntrenamiento($paciente_id)
    {
        $ejercicios=Ejercicio::all();
        return view('Entrenamiento/crear')->withEjercicios($ejercicios)->withPaciente_id($paciente_id);
    }
    public function storeEntrenamiento(Request $request, $paciente_id)
    {
        $entrenamiento =new Entrenamiento();
        $entrenamiento->descripcion=$request->descripcion;
        $entrenamiento->paciente_id =$paciente_id;
        $entrenamiento->save();

        $ejercicios=$request->ejercicios;
        $comentario=$request->comentario;
        $repeticion=$request->repeticion;
        $dia_semana=$request->dia_semana;
        for($e=0;$e<sizeof($ejercicios);$e++){
            $entrenamiento->ejercicios()->attach($ejercicios[$e],['repeticion'=>$repeticion[$e],'comentario'=>$comentario[$e],'dia_semana'=>$dia_semana[$e]]);
        }
        $entrenamiento->save();

        if($entrenamiento->save()){
            return redirect()->route('entrenamientos.show',['id'=>$entrenamiento->id]);
        }else{
            return back()->with(flash('Dieta no creada'));
        }
    }
    public function indexEntrenamientos($id)
    {
        $paciente=Paciente::find($id);
        $entrenamientos=$paciente->entrenamientos()->get();
        $entrenamientos=$entrenamientos->sortByDesc('created_at');
        return view('Entrenamiento/index')->with(['entrenamientos'=>$entrenamientos, 'paciente'=>$paciente,'paciente_id'=>$id]);
    }
    //OBSERVACIONES
    public function showPacienteObservacion($id)
    {
        $paciente=Paciente::find($id);
        $observaciones=Paciente::find($id)->observaciones()->where('paciente_id',$id)->get();
        $observacion=$observaciones->sortByDesc('created_at')->first();

        return view('Paciente/detalle')->with(['paciente'=>$paciente,'observacion'=>$observacion]);
    }

    public function show($id)
    {
        $paciente=Paciente::find($id);
        return view('Paciente/datosPersonales')->with(['paciente'=>$paciente]);

    }
    public function showDatos($id)
    {
        $paciente=Paciente::find($id);
       return view('Paciente/datosPersonales')->with(['paciente'=>$paciente]);

    }

    //OBSERVACIONES DE 1 PACIENTE
    public function showObservaciones($id)
    {
        $paciente=Paciente::find($id);
        $observaciones=Paciente::find($id)->observaciones()->where('paciente_id',$id)->get();
        $observaciones=$observaciones->sortByDesc('created_at');
        return view('Observacion/index')->with(['observaciones'=>$observaciones, 'paciente'=>$paciente,'paciente_id'=>$id]);
    }

    //CREAR OBSERVACION AL PACIENTE
    public function createObservacion($paciente_id)
    {
        //
        return view('Observacion/crear',['paciente_id'=>$paciente_id]);
    }

    //GUARDAR OBSERVACION
    public function storeObservacion(Request $request, $paciente_id)
    {
        //Guardar en la BD
        $observacion=new Observacion();
        $observacion->paciente_id =$paciente_id;
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

        if($observacion->save()){

        flash('Observación creada correctamente');

        return redirect()->route('pacientes.showPacienteObservacion',['id'=>$paciente_id]);


        }else{
            flash('Observación no creada');
            return back();
        }
    }

    //INDEXAR PACIENTES
    public function index(Request $request)
    {
        //función para el buscador
        $pacientes=Paciente::name($request->get('apellidos'))->orderBy('apellidos','ASC')->paginate();
        return view('Paciente/index',compact('pacientes'));
        /*return view('Paciente/detalle')->with(['pacientes'=>$pacientes]);*/
    }

    //CREAR PACIENTE
    public function create()
    {
        //
        return view('Paciente/crear');
    }
    //GUARDAR
    public function store(Request $request)
    {
        //Validaciones: en el caso de que haya un error de validación, devuelve un error a la vista
        $this-> validate($request,
            ['nombre'=>'required',
                'apellidos'=>'required',
                'fechan'=>'required',
                'optradio'=>'required',
                'altura'=>'required',
                'optradio1'=>'required',

            ]);
        //Guardar en la BD
        $paciente = new Paciente();
        $paciente->nombre = $request->nombre;
        $paciente->apellidos = $request->apellidos;
        $paciente->fecha_nacimiento= $request->fechan;
        $paciente->edad = $paciente->getEdadAttribute();
        $paciente->nhc = $request->nhc;
        $paciente->sexo=$request->optradio;
        $paciente->altura=$request->altura;
        $paciente->actividad_fisica=$request->optradio1;
        $paciente->patologias=$request->patologias;

        $paciente->save();

        if($paciente->save()){
            return redirect()->route('pacientes.createObservacion',['id'=>$paciente->id]);
        }else{
            return back()->with('nmsj','No se ha dado de alta al paciente correctamente');
        }
    }



    //EDITAR
    public function edit($id)
    {
        //
        $paciente = Paciente::find($id);
        return view('Paciente/editar')->with(['paciente'=>$paciente]);
    }

    //ACTUALIZAR
    public function update(Request $request, $id)
    {
        //
        //Validaciones: en el caso de que haya un error de validación, devuelve un error a la vista
        $this-> validate($request,
            ['nombre'=>'required',
                'apellidos'=>'required',
                'fechan'=>'required',
                'optradio'=>'required',
                'altura'=>'required',
                'optradio1'=>'required',

            ]);
        //Guardar en la BD
        $paciente = Paciente::find($id);
        $paciente->nombre = $request->nombre;
        $paciente->apellidos=$request->apellidos;
        $paciente->fecha_nacimiento= $request->fechan;
        $paciente->nhc = $request->nhc;
        $paciente->sexo=$request->optradio;
        $paciente->altura=$request->altura;
        $paciente->actividad_fisica=$request->optradio1;
        $paciente->patologias=$request->patologias;

        $paciente->save();

        if($paciente->save()){
            return redirect()->route('pacientes.showDatos',['paciente'=>$paciente]);
        }else{
            return back()->with('nmsj','No se ha actualizado al paciente');
        }
    }
    public function indexPacientes(){
        $pacientes=Paciente::all();
        $pacientes=$pacientes->sortBy('apellidos',2);
        return view('Paciente/index',compact('pacientes'));
    }

    //ELIMINAR
    public function destroy($id)
    {
        Paciente::destroy($id);
        return redirect()->route('pacientes.indexPacientes');
    }


}
