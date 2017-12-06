@extends('layouts.app')
<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Marvel" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<style>
    html, body {

        background-image: url("/images/fondos/fruta1.jpg");
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
    .container-fluid {
        text-align: -webkit-center;

    }

    .button{
        background-color: transparent;
    }
    .table-sortable tbody tr {
        cursor: move;
    }
</style>
@section('content')
    <div class="container-fluid">

        <div class="panel panel-default" style="background-color: transparent; border: 0px; box-shadow: none">
            <!--CABECERA-->
            <div class="panel-heading" style="margin-top:10px;border-radius:5px;border-bottom-width:0px;height: 80px;color: #555555; font-family: 'Satisfy', cursive;background-color: rgb(178, 226, 225);">
                <div class="row">
                    <div class="col-lg-11 col-md-11 col-sm-11 text-center">
                        <p  style="font-size: 40px;text-align: center;margin-bottom: 0px;padding-left: 120px">Resumen dieta</p>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1" style="margin-top: -10px;text-align: right">
                        <a href="{{route('pacientes.showPacienteObservacion',$paciente_id)}}" role="button" class="btn"
                           style="padding: 0px; border: none" data-toggle="tooltip" data-placement="auto" title="Volver al menú">
                            <img src="\images\btns\volver.png" style="width: 80px;height: 80px;">
                        </a>
                    </div>
                </div>
            </div>

            <!--CUERPO-->
            <div class="panel-body" style="font-family: 'Marvel', sans-serif;color: #000000;">
                <div class="row ">
                    <a href="{{route('dietas.generarPdfDieta',$dieta_id)}}" data-toggle="tooltip" data-placement="auto" title="Imprimir">
                        <img src="\images\btns\imprimir.png" style="margin-top:-15px;width: 90px;height: 90px;border: 0px;">
                    </a>
                </div>

                <div class="row" style="margin-top: 15px">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                            <p style="margin-bottom: 0px;font-size: 20px"><strong>INFORMACIÓN DE LA DIETA</strong></p>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px; font-size: 20px">
                    <div class="col-lg-2 col-md-2 col-sm-2 text-left " style="padding-left: 50px;width: 215px;">
                        <label class="text-left">Fecha de inicio:</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 text-left ">
                        <p class="text-left">{{$dieta->created_at->format('d - m - Y')}}</p>
                    </div>
                </div>
                <div class="row" style="margin-top: 5px; font-size: 20px">
                    <div class="col-lg-2 col-md-2 col-sm-2 text-left" style="padding-left: 50px;width: 215px;">
                        <label class="text-left">Duración:</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 text-left ">
                        <p class="text-left">{{$dieta->duracion.' días'}}</p>
                    </div>
                </div>
                <div class="row" style="margin-top: 5px; font-size: 20px">
                    <div class="col-lg-2 col-md-2 col-sm-2 text-left" style="padding-left: 50px;width: 215px;">
                        <label class="text-left">Kcals totales:</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 text-left ">
                        <p class="text-left">{{$dieta->kcal}}</p>
                    </div>
                </div>
                <div class="row" style="margin-top: 5px; font-size: 20px">
                    <div class="col-lg-2 col-md-2 col-sm-2 text-left" style="padding-left: 50px;width: 215px;">
                        <label class="text-left">Descripción:</label>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-9 text-left ">
                        <p class="text-left" type="text">{{$dieta->descripcion}}</p>
                    </div>
                </div>
                <div class="row" style="margin-top: 15px">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                            <p style="margin-bottom: 0px;font-size: 20px">
                                <strong>DIETA</strong>
                            </p>
                        </div>
                    </div>
                </div>

                <div name="LUNES">
                    <table class="table" style="color: black; font-size: 20px;">
                        <thead style="border: none">
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">LUNES</th>
                        </tr>
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Desayuno:</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='lunes' & $a->pivot->momento=='desayuno')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Media mañana:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='lunes' & $a->pivot->momento=='mediaMañana')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Almuerzo:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='lunes' & $a->pivot->momento=='almuerzo')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Merienda:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='lunes' & $a->pivot->momento=='merienda')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Cena:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='lunes' & $a->pivot->momento=='cena')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div name="MARTES">
                    <table class="table" style="color: black; font-size: 20px;">
                        <thead style="border: none">
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">MARTES</th>
                        </tr>
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Desayuno:</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='martes' & $a->pivot->momento=='desayuno')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Media mañana:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='martes' & $a->pivot->momento=='mediaMañana')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Almuerzo:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='martes' & $a->pivot->momento=='almuerzo')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Merienda:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='martes' & $a->pivot->momento=='merienda')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Cena:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='martes' & $a->pivot->momento=='cena')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div name="MIERCOLES">
                    <table class="table" style="color: black; font-size: 20px;">
                        <thead style="border: none">
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">MIERCOLES</th>
                        </tr>
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Desayuno:</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='miercoles' & $a->pivot->momento=='desayuno')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Media mañana:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='miercoles' & $a->pivot->momento=='mediaMañana')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Almuerzo:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='miercoles' & $a->pivot->momento=='almuerzo')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Merienda:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='miercoles' & $a->pivot->momento=='merienda')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Cena:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='miercoles' & $a->pivot->momento=='cena')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div name="JUEVES">
                    <table class="table" style="color: black; font-size: 20px;">
                        <thead style="border: none">
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">JUEVES</th>
                        </tr>
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Desayuno:</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='jueves' & $a->pivot->momento=='desayuno')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Media mañana:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='jueves' & $a->pivot->momento=='mediaMañana')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Almuerzo:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='jueves' & $a->pivot->momento=='almuerzo')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Merienda:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='jueves' & $a->pivot->momento=='merienda')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Cena:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='jueves' & $a->pivot->momento=='cena')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div name="VIERNES">
                    <table class="table" style="color: black; font-size: 20px;">
                        <thead style="border: none">
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">VIERNES</th>
                        </tr>
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Desayuno:</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='viernes' & $a->pivot->momento=='desayuno')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Media mañana:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='viernes' & $a->pivot->momento=='mediaMañana')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Almuerzo:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='viernes' & $a->pivot->momento=='almuerzo')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Merienda:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='viernes' & $a->pivot->momento=='merienda')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Cena:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='viernes' & $a->pivot->momento=='cena')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div name="SABADO">
                    <table class="table" style="color: black; font-size: 20px;">
                        <thead style="border: none">
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">SÁBADO</th>
                        </tr>
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Desayuno:</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='sabado' & $a->pivot->momento=='desayuno')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Media mañana:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='sabado' & $a->pivot->momento=='mediaMañana')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Almuerzo:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='sabado' & $a->pivot->momento=='almuerzo')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Merienda:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='sabado' & $a->pivot->momento=='merienda')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Cena:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='sabado' & $a->pivot->momento=='cena')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div name="DOMINGO">
                    <table class="table" style="color: black; font-size: 20px;">
                        <thead style="border: none">
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">DOMINGO</th>
                        </tr>
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Desayuno:</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='domingo' & $a->pivot->momento=='desayuno')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Media mañana:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='domingo' & $a->pivot->momento=='mediaMañana')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Almuerzo:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='domingo' & $a->pivot->momento=='almuerzo')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Merienda:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='domingo' & $a->pivot->momento=='merienda')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        <tr style="border: none">
                            <th style="border: 0px; padding-left: 50px">Cena:</th>
                        </tr>
                        @foreach($alimentos as $a)
                            @if($a->pivot->dia_semana=='domingo' & $a->pivot->momento=='cena')
                                <tr style="border: none">
                                    <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 50px">{{$a->nombre}}</td>
                                    <td class="col-md-1 col-lg-1 col-sm-2" style="border: none">{{'Raciones:&nbsp;&nbsp;'.$a->pivot->cantidad}}</td>
                                    <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">{{$a->pivot->comentario}}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection