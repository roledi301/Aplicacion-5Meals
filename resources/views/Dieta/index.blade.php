@extends('layouts.app')
<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Marvel" rel="stylesheet">

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



</style>

@section('content')
    <div class="container-fluid">

        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>

        <div class="panel panel-default" style="background-color: transparent; border: 0px; box-shadow: none">


            <!--CABECERA-->
            <div class="panel-heading" style=" margin-top:10px;border-radius:5px;border-bottom-width:0px;height: 80px;
                                              color: #555555; font-family: 'Satisfy', cursive;background-color: rgb(178, 226, 225);">
                <div class="row">
                    <div class="col-md-11 col-lg-11 col-sm-11 text-center">
                        <p  style="font-size: 40px;text-align: center;margin-bottom: 0px;">
                            Registro de dietas
                        </p>
                    </div>
                    <div class="col-md-1 col-lg-1 col-sm-1" style="margin-top: -10px;text-align: right">
                        <a href="{{route('pacientes.showPacienteObservacion',$paciente_id)}}" data-toggle="tooltip" data-placement="auto" title="Volver al perfil del paciente">
                            <img src="\images\btns\volver.png" style="width: 80px;height: 80px;border: 0px;padding-left: 0px;">
                        </a>
                    </div>
                </div>
            </div>
            <!--CUERPO-->
            <div class="panel-body" style="font-family: 'Marvel', sans-serif;color: #000000;">
                <div class="row" style="margin-top: 10px; margin-bottom: 20px; font-size: 20px">
                    <div class="col-lg-4 col-md-4 col-sm-4 text-left ">
                        <strong>&nbsp;Nombre del paciente:</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{$paciente->nombre}}&nbsp;&nbsp;&nbsp;{{$paciente->apellidos}}
                    </div>
                </div>

                <!--Tabla-->
                <div class="row" style="text-align: center; margin-top: 10px">
                    <table class="table table-hover">
                        @if(isset($dietas))
                            <thead  align="center" style="text-align: center;background-color:rgba(111, 225, 224, 0.23); color: black;font-size: 20px;">
                            <th  style="padding: 0px; padding-top: 10px;border-bottom-width: 0px;" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                <p>Fecha de inicio</p>
                            </th>
                            <th  style="padding: 0px; padding-top: 10px;border-bottom-width: 0px;" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                <p>Nombre</p>
                            </th>
                            <th  style="padding: 0px; padding-top: 10px;border-bottom-width: 0px;" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                <p>Duración</p>
                            </th>
                            <th  style="padding: 0px; padding-top: 10px;border-bottom-width: 0px;" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                <p>Opciones</p>
                            </th>
                            </thead>

                            <!--DATOS-->

                            <tbody align="center" style="color: #000000; font-size: 18px">
                            @foreach($dietas as $d)<!--for-->

                            <tr style="font-size: 20px;align-content: center">
                                <td  style="border-bottom-width: 0px;border-top-width: 0px;" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                    <p style="margin-bottom: 0px;margin-top: 12px">{{$d->created_at->format('d - m - Y')}}</p>
                                </td>
                                <td  style="border-bottom-width: 0px;border-top-width: 0px;" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                    <p style="margin-bottom: 0px;margin-top: 12px;">{{$d->nombre}}</p>
                                </td>
                                <td  style="border-bottom-width: 0px;border-top-width: 0px;" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                    <p style="margin-bottom: 0px;margin-top: 12px;">{{$d->duracion.'&nbsp;&nbsp;&nbsp;días'}}</p>
                                </td>

                                <!--BOTONES-->
                                <td  style="border-bottom-width: 0px;border-top-width: 0px;" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                                            <a href="{{route('dietas.show',$d->id)}}" role="button" class="btn" style="border-width: 0px; padding: 0px;"
                                               data-toggle="tooltip" data-placement="auto" title="Ver detalle">
                                                <img src="\images\btns\buscar.png" style="width:60px;height:60px;border:0;">
                                            </a>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                                            {{ Form::open(['style'=>'margin-bottom: 0px','method' => 'DELETE', 'route' => ['dietas.destroy', $d->id]]) }}
                                            {{ Form::image('images\btns\no2.png', 'name', ['class' => 'btn', 'onclick' => 'if(!confirm("¿Está seguro? Recuerdas que si eliminas la dieta se perderán todos sus datos"))event.preventDefault();','data-toggle'=>'tooltip', 'data-placement'=>'auto','title'=>'Eliminar dieta','style' => 'margin-right: 80px;width: 60px;height: 60px;padding-bottom: 0px;border-bottom-width: 0px;padding-right: 0px;border-top-width: 0px;padding-top: 0px;padding-left: 0px;border-left-width: 0px;border-right-width: 0px;']) }}
                                            {{ Form::close() }}
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection