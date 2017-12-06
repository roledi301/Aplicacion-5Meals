<?php

namespace App\Http\Controllers;

use App\Ejercicio;
use App\Entrenamiento;
use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;

class EntrenamientoController extends Controller
{

    public function index()
    {

    }
    public function create()
    {

    }


    public function store( Request $request)
    {


    }


    public function show($id)
    {
        $entrenamiento=Entrenamiento::find($id);
        $paciente_id=$entrenamiento->paciente_id;
        $entrenamiento_id=$entrenamiento->id;
        $ejercicios=$entrenamiento->ejercicios()->get();
        return view('Entrenamiento/show')->with(['entrenamiento'=>$entrenamiento,'ejercicios'=>$ejercicios,'paciente_id'=>$paciente_id,'entrenamiento_id'=>$entrenamiento_id]);
    }
    public function generarPdfEntrenamiento($id_entrenamiento)
    {
        $entrenamiento=Entrenamiento::find($id_entrenamiento);
        $paciente=Paciente::find($entrenamiento->paciente_id);
        $ejercicios=$entrenamiento->ejercicios()->get();
        $pdf = PDF::loadView('Entrenamiento/pdfEntrenamiento', compact('entrenamiento','ejercicios','paciente'));
        return $pdf->download('Entrenamiento.pdf');

        /*return view('Entrenamiento/pdfEntrenamiento')->with(['entrenamiento'=>$entrenamiento,'ejercicios'=>$ejercicios,'paciente'=>$paciente]);*/
    }

    public function edit($id)
    {

    }


    public function update(Request $request, $id)
    {

    }


    public function destroy($id)
    {
        Entrenamiento::destroy($id);
        return back();
    }
}
