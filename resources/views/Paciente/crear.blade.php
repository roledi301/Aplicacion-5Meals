<!--FORMULARIO CREAR PACIENTE-->
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
        font-size: 20px;
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

        <!--Mensajes en botones-->
        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>

        <div class="panel panel-default" style="background-color: transparent; border: 0px; box-shadow: none">

            <!--CABECERA-->
            <div class="panel-heading" style="margin-top:10px;border-radius:5px;border-bottom-width:0px;height: 80px;color: #555555; font-family: 'Satisfy', cursive;background-color: rgb(178, 226, 225);">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <p  style="font-size: 40px;text-align: center;margin-bottom: 0px;">Nuevo Paciente</p>
                    </div>
                </div>
            </div>


            <!--CUERPO-->
            <div class="panel-body" style="font-family: 'Marvel', sans-serif;color: #000000;">
                <form class="form-horizontal" role="form" method="post" action="{{url('pacientes')}}" style="margin-bottom: 0px;">
                    {{ csrf_field() }}


                    <div class="row" style="margin-top: 15px">
                        <div class="col-lg-5 col-md-5 col-sm-5">
                            <div class="panel-heading" style=";background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                <p style="margin-bottom: 0px;font-size: 20px"><strong>Datos personales</strong></p>
                            </div>
                            <div class="row" style="margin-top: 30px">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1 text-left">
                                    <label for="nombre" style="font-size: 20px;">
                                        <strong>Nombre:</strong>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <input type="text" class="form-control" name="nombre" style="width: 350px;font-size: 20px" placeholder="Nombre" required>
                                    @if($errors->has('nombre'))
                                        <span style="color: red">{{$errors->first('nombre')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row" style="margin-top: 30px">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1 text-left">
                                    <label for="apellidos" style="font-size: 20px;"><strong> Apellidos:</strong></label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <input type="text" class="form-control" name="apellidos" style="width: 350px;font-size: 20px"placeholder="Apellidos" required>
                                    @if($errors->has('apellidos'))
                                        <span style="color: red">{{$errors->first('apellidos')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row" style="margin-top: 30px">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1 text-left">
                                    <label for="fechan"  style="font-size: 20px;">
                                        <strong>Fecha de nacimiento:</strong>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <input type="date" class="form-control" name="fechan" style="width: 350px;font-size: 20px" required>
                                    @if($errors->has('fechan'))
                                        <span style="color: red">{{$errors->first('fechan')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row" style="margin-top: 30px">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1 text-left">
                                    <label for="sexo" style="font-size: 20px;">
                                        <strong>Sexo:</strong>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 " style="margin-left: 20px">
                                    <div class="radio text-left" style="font-size: 20px;" >
                                        <input style="top: 12px;" type="radio" name="optradio"  value="mujer" required><strong>Mujer</strong>
                                    </div>
                                    <div class="radio text-left" style="font-size: 20px;">
                                        <input style="top: 12px;" type="radio" name="optradio"  value="hombre" required><strong>Hombre</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-md-5 col-sm-5 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
                            <div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                <p style="margin-bottom: 0px;font-size: 20px"><strong>Datos de interés</strong></p>
                            </div>
                            <div class="row" style="margin-top: 30px">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1 text-left">
                                    <label for="NHC"   style="font-size: 20px">
                                        <strong>NHC:</strong>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <input type="text" class="form-control" name="nhc" style="font-size: 20px;width: 350px"placeholder="Número de Historia Clínica">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 30px">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1 text-left">
                                    <label for="patologias"  style="font-size: 20px;">
                                        <strong>Patologías:</strong>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <input type="text" class="form-control" name="patologias" style="font-size: 20px;width: 350px"placeholder="Intolerencias alimenticias, alergias" required>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 30px">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1 text-left">
                                    <label for="altura" style="font-size: 20px;">
                                        <strong>Altura:</strong>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <input type="text" class="form-control" name="altura" style="font-size: 20px;width: 350px"placeholder="Altura en metros" required>
                                    @if($errors->has('altura'))
                                        <span style="color: red">{{$errors->first('altura')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row" style="margin-top: 30px">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1 text-left">
                                    <label for="grupo"  style="font-size: 20px;">
                                        <strong>Actividad física:</strong>
                                    </label>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4" style="margin-left: 20px">
                                    <div class="radio text-left" style="font-size: 20px;" >
                                        <input type="radio" style="top: 12px;" name="optradio1"  value="ligera" required><strong>Ligera</strong>
                                    </div>
                                    <div class="radio text-left" style="font-size: 20px;">
                                        <input type="radio" style="top: 12px;" name="optradio1"  value="moderada" required><strong>Moderada</strong>
                                    </div>
                                    <div class="radio text-left" style="font-size: 20px;">
                                        <input type="radio" style="top: 12px;" name="optradio1"  value="elevada" required><strong>Elevada</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--BOTONES-->
                    <div class="row" style="margin-top: 20px">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-5 col-lg-offset-5 col-sm-offset-5">
                            <button style="border: none" class="button" type="submit" data-toggle="tooltip" data-placement="auto" title="Dar de alta">
                                <img src="\images\btns\si2.png" style="width: 90px;height: 90px;border: 0px;">
                            </button>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1">
                            <a href="/menu" data-toggle="tooltip" data-placement="auto" title="Cancelar">
                                <img src="\images\btns\no2.png" style="width: 90px;height: 90px;border: 0px;">
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection