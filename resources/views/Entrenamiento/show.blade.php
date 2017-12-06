@extends('layouts.app')
<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Marvel" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<style>
    html, body {

        background-image: url("/images/fondos/sport2.jpg");
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        font-size: 20px;
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
                        <p  style="font-size: 40px;text-align: center;margin-bottom: 0px;padding-left: 130px">Resumen entrenamiento</p>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1" style="margin-top: -10px;text-align: right">
                        <a href="{{route('pacientes.indexEntrenamientos',$paciente_id)}}" role="button" class="btn"
                           style="padding: 0px; border: none" data-toggle="tooltip" data-placement="auto" title="Volver a menu del paciente">
                            <img src="\images\btns\volver.png" style="width: 80px;height: 80px;">
                        </a>
                    </div>
                </div>
            </div>
            <!--CUERPO-->
            <div class="panel-body" style="font-family: 'Marvel', sans-serif;color: #000000;">
                <div class="row ">
                    <a href="{{route('entrenamientos.generarPdfEntrenamiento',$entrenamiento_id)}}" data-toggle="tooltip" data-placement="auto" title="Imprimir">
                        <img src="\images\btns\imprimir.png" style="width: 90px;height: 90px;border: 0px;">
                    </a>
                </div>
                <div class="row" style="margin-top: 15px">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                            <p style="margin-bottom: 0px;font-size: 20px"><strong>INFORMACIÓN DEL ENTRENAMIENTO</strong></p>
                        </div>
                        <div class="row" style="margin-top: 20px; font-size: 20px">
                            <div class="col-lg-3 col-md-3 col-sm-3 text-left " style="padding-left: 50px;width: 285px">
                                <strong>Fecha del entrenamiento:</strong>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 text-left ">
                                {{$entrenamiento->created_at->format('d - m - Y')}}
                            </div>
                        </div>
                        <div class="row" style="margin-top: 20px; font-size: 20px">
                            <div class="col-lg-3 col-md-3 col-sm-3 text-left" style="padding-left: 50px;width: 285px">
                                <strong>Descripción del entrenamiento:</strong>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 text-left ">
                                {{$entrenamiento->descripcion}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 30px">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                            <p style="margin-bottom: 0px;font-size: 20px"><strong>TABLA DE EJERCICIOS</strong></p>
                        </div>
                    </div>
                        <div class="row" >
                            <table class="table" style="color: black; font-size: 20px;">
                                <tr style="border-top-width: 0px;"><th style="border-top-width: 0px;"></th></tr>
                                <tr style="border-top-width: 0px;">
                                    <th style="border-top-width: 0px; padding-left: 70px">LUNES</th>
                                </tr>
                                @foreach($ejercicios as $e)
                                    @if($e->pivot->dia_semana == 'lunes')
                                        <tr style="border: none">
                                            <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 70px">{{$e->nombre.' '.$e->duracion.' minutos'}}</td>
                                            <td class="col-md-2 col-lg-2 col-sm-2" style="border: none">Repeticiones: &nbsp;&nbsp;&nbsp;{{$e->pivot->repeticion}}</td>
                                            <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">Observación: &nbsp;&nbsp;&nbsp;{{$e->pivot->comentario}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr style="border-top-width: 0px;"><th style="border-top-width: 0px;"></th></tr>
                                <tr style="border-top-width: 0px;">
                                    <th style="border-top-width: 0px;padding-left: 70px">MARTES</th>
                                </tr>
                                @foreach($ejercicios as $e)
                                    @if($e->pivot->dia_semana == 'martes')
                                        <tr style="border: none">
                                            <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 70px">{{$e->nombre.' '.$e->duracion.' minutos'}}</td>
                                            <td class="col-md-2 col-lg-2 col-sm-2" style="border: none">Repeticiones: &nbsp;&nbsp;&nbsp;{{$e->pivot->repeticion}}</td>
                                            <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">Observación: &nbsp;&nbsp;&nbsp;{{$e->pivot->comentario}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr style="border-top-width: 0px;"><th style="border-top-width: 0px;"></th></tr>
                                <tr style="border-top-width: 0px;">
                                    <th style="border-top-width: 0px;padding-left: 70px">MIÉRCOLES</th>
                                </tr>
                                @foreach($ejercicios as $e)
                                    @if($e->pivot->dia_semana == 'miercoles')
                                        <tr style="border: none">
                                            <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 70px">{{$e->nombre.' '.$e->duracion.' minutos'}}</td>
                                            <td class="col-md-2 col-lg-2 col-sm-2" style="border: none">Repeticiones: &nbsp;&nbsp;&nbsp;{{$e->pivot->repeticion}}</td>
                                            <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">Observación: &nbsp;&nbsp;&nbsp;{{$e->pivot->comentario}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr style="border-top-width: 0px;"><th style="border-top-width: 0px;"></th></tr>
                                <tr style="border-top-width: 0px;">
                                    <th style="border-top-width: 0px;padding-left: 70px">JUEVES</th>
                                </tr>
                                @foreach($ejercicios as $e)
                                    @if($e->pivot->dia_semana == 'jueves')
                                        <tr style="border: none">
                                            <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 70px">{{$e->nombre.' '.$e->duracion.' minutos'}}</td>
                                            <td class="col-md-2 col-lg-2 col-sm-2" style="border: none">Repeticiones: &nbsp;&nbsp;&nbsp;{{$e->pivot->repeticion}}</td>
                                            <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">Observación: &nbsp;&nbsp;&nbsp;{{$e->pivot->comentario}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr style="border-top-width: 0px;"><th style="border-top-width: 0px;"></th></tr>
                                <tr style="border-top-width: 0px;">
                                    <th style="border-top-width: 0px;padding-left: 70px">VIERNES</th>
                                </tr>
                                @foreach($ejercicios as $e)
                                    @if($e->pivot->dia_semana == 'viernes')
                                        <tr style="border: none">
                                            <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 70px">{{$e->nombre.' '.$e->duracion.' minutos'}}</td>
                                            <td class="col-md-2 col-lg-2 col-sm-2" style="border: none">Repeticiones: &nbsp;&nbsp;&nbsp;{{$e->pivot->repeticion}}</td>
                                            <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">Observación: &nbsp;&nbsp;&nbsp;{{$e->pivot->comentario}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr style="border-top-width: 0px;"><th style="border-top-width: 0px;"></th></tr>
                                <tr style="border-top-width: 0px;">
                                    <th style="border-top-width: 0px;padding-left: 70px">SÁBADO</th>
                                </tr>
                                @foreach($ejercicios as $e)
                                    @if($e->pivot->dia_semana == 'sabado')
                                        <tr style="border: none">
                                            <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 70px">{{$e->nombre.' '.$e->duracion.' minutos'}}</td>
                                            <td class="col-md-2 col-lg-2 col-sm-2" style="border: none">Repeticiones: &nbsp;&nbsp;&nbsp;{{$e->pivot->repeticion}}</td>
                                            <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">Observación: &nbsp;&nbsp;&nbsp;{{$e->pivot->comentario}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                <tr style="border-top-width: 0px;"><th style="border-top-width: 0px;"></th></tr>
                                <tr style="border-top-width: 0px;">
                                    <th style="border-top-width: 0px;padding-left: 70px">DOMINGO</th>
                                </tr>
                                @foreach($ejercicios as $e)
                                    @if($e->pivot->dia_semana == 'domingo')
                                        <tr style="border: none">
                                            <td class="col-lg-3 col-md-3 col-sm-3" style="border: none; padding-left: 70px">{{$e->nombre.' '.$e->duracion.' minutos'}}</td>
                                            <td class="col-md-2 col-lg-2 col-sm-2" style="border: none">Repeticiones: &nbsp;&nbsp;&nbsp;{{$e->pivot->repeticion}}</td>
                                            <td class="col-md-7 col-lg-7 col-sm-7" style="border: none">Observación: &nbsp;&nbsp;&nbsp;{{$e->pivot->comentario}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection