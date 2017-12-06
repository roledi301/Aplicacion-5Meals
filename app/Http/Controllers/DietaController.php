<?php

namespace App\Http\Controllers;

use App\Alimento;
use Illuminate\Http\Request;
use App\Dieta;
use App\Paciente;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;
class DietaController extends Controller
{
    public function show($id)
    {
        $dieta=Dieta::find($id);
        $dieta_id=$dieta->id;
        $paciente_id=$dieta->paciente_id;
        $alimentos=$dieta->alimentos()->get();
        return view('Dieta/show')->with(['dieta_id'=>$dieta_id,'dieta'=>$dieta,'alimentos'=>$alimentos,'paciente_id'=>$paciente_id]);
    }

    public function generarPdfDieta($dieta_id)
    {
        $dieta=Dieta::find($dieta_id);
        $paciente=Paciente::find($dieta->paciente_id);
        $alimentos=$dieta->alimentos()->get();
        $pdf = PDF::loadView('Dieta/pdfDieta', compact('dieta','alimentos','paciente'));
       return $pdf->download('Dieta.pdf');

/*        return view('Dieta/pdfDieta')->with(['dieta'=>$dieta,'alimentos'=>$alimentos,'paciente'=>$paciente]);*/
    }


    public function destroy($id)
    {
        Dieta::destroy($id);
        return back();
    }

    public function index()
    {
        //Sustiudo por pacientes.indexDietas
    }

    public function create()
    {
        //Sustituido por pacientes.createDieta
    }

    public function store(Request $request)
    {
        //Sustituido por pacientes.storeDieta
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

}
