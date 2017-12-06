@extends('layouts.app')
<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Marvel" rel="stylesheet">

<style>
    html, body {

        background-image: url("/images/fondos/registro2.jpg");
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
        <div class="panel panel-default" style="background-color: transparent; border: 0px; box-shadow: none">

            <!--CABECERA-->
            <div class="panel-heading" style="margin-top:10px;border-radius:5px;border-bottom-width:0px;height: 80px;color: #555555; font-family: 'Satisfy', cursive;background-color: rgb(178, 226, 225);">
                <div class="row">
                    <div class="col-lg-11 col-md-11 col-sm-11 text-center">
                        <p  style="font-size: 40px;text-align: center;margin-bottom: 0px; padding-left: 100px">Datos personales del paciente</p>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1" style="margin-top: -10px;text-align: right">
                        <a href="{{route('pacientes.showPacienteObservacion',$paciente->id)}}" role="button" class="btn"
                           style="padding: 0px; border: none" data-toggle="tooltip" data-placement="auto" title="Volver a menu del paciente">
                            <img src="\images\btns\volver.png" style="width: 80px;height: 80px;">
                        </a>
                    </div>
                </div>
            </div>

            <!--CUERPO-->
            <div class="panel-body" style="font-family: 'Marvel', sans-serif;color: #000000;">
                <div class="row" style="margin-top: 30px">
                    <div class="col-lg-5 col-md-5 col-sm-5">
                        <div class="panel-heading" style=";background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                            <p style="margin-bottom: 0px;font-size: 20px"><strong>Datos personales</strong></p>
                        </div>
                        <div class="row" style="margin-top: 30px">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 text-left">
                                <label for="nombre" style="font-size: 20px;">
                                    <strong>Nombre:</strong>
                                </label>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                                <p class="text-left" style="font-size: 20px">{{$paciente->nombre}}</p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 text-left">
                                <label for="apellidos" style="font-size: 20px;"><strong> Apellidos:</strong></label>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                                <p class="text-left"  style="font-size: 20px">{{$paciente->apellidos}}</p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 text-left">
                                <label for="fechan"  style="font-size: 20px;">
                                    <strong>Edad:</strong>
                                </label>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                                <p class="text-left"  style="font-size: 20px">{{$paciente->getEdadAttribute()}} años</p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 text-left">
                                <label for="sexo" style="font-size: 20px;">
                                    <strong>Sexo:</strong>
                                </label>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">

                            <?php
                                $sexo='';
                                if($paciente->sexo == 'hombre'){
                                    $sexo ='Hombre';
                                }else{
                                    $sexo='Mujer';
                                }
                                ?>
                                <p class="text-left" style="font-size: 20px">{{$sexo}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-5 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
                        <div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                            <p style="margin-bottom: 0px;font-size: 20px"><strong>Datos de interés</strong></p>
                        </div>
                        <div class="row" style="margin-top: 30px">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 text-left">
                                <label for="NHC"   style="font-size: 20px">
                                    <strong>NHC:</strong>
                                </label>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                                <p class="text-left" style="font-size: 20px">{{$paciente->nhc}}</p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 text-left">
                                <label for="patologias"  style="font-size: 20px;">
                                    <strong>Patologías:</strong>
                                </label>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                                <p class="text-left"  style="font-size: 20px" >{{$paciente->patologias}}</p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 text-left">
                                <label for="altura" style="font-size: 20px;">
                                    <strong>Altura:</strong>
                                </label>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                                <p class="text-left"  style="font-size: 20px">{{$paciente->altura}}</p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 text-left">
                                <label for="grupo"  style="font-size: 20px;">
                                    <strong>Actividad física:</strong>
                                </label>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                                <?php
                                $act='';
                                if($paciente->actividad_fisica=='ligera'){
                                    $act='Ligera';
                                }else if($paciente->actividad_fisica=='moderada'){
                                    $act='Moderada';
                                }else{
                                    $act='Elevada';
                                }
                                ?>
                                <p class="text-left" style="font-size: 20px">{{$act}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!--BOTON DE EDITAR-->

                <div class="row text-center" style="margin-top: 50px" >
                    <div class="col-md-12 col-lg-12 text-center">
                        <div class="form-group">
                            <a href="{{route('pacientes.edit',$paciente->id)}}" role="button" class="btn"
                               style="padding: 0px; border: none" data-toggle="tooltip" data-placement="auto" title="Editar datos personales">
                                <img src="\images\btns\editar2.png" style="width: 100px;height: 100px;">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection