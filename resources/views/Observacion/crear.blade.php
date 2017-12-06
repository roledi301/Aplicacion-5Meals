<!--FORMULARIO CREAR OBSERVACIONES AL PACIENTE-->
@extends('layouts.app')
<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Marvel" rel="stylesheet">

<style>
    html, body {

        background-image: url("/images/fondos/paciente2.jpg");
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        font-size: 18px;
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
            <div class="panel-heading" style="margin-top:10px;border-radius:5px;border-bottom-width:0px;height: 80px;color: #555555; font-family: 'Satisfy', cursive;background-color: rgb(178, 226, 225);">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <p  style="font-size: 40px;text-align: center;margin-bottom: 0px;">Nueva observación</p>
                    </div>
                </div>
            </div>

            <!--CUERPO-->
            <div class="panel-body" style="font-family: 'Marvel', sans-serif;color: #000000;">
                <form class="form-horizontal" role="form" method="post" action="{{route('pacientes.storeObservacion',$paciente_id)}}">
                    {{ csrf_field() }}

                    <div class="row" style="margin-top: 10px">
                        <div class="col-lg-4 col-md-4 col-sm-4 ">
                            <div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                <p style="margin-bottom: 0px;font-size: 18px"><strong>Diámetro</strong></p>
                            </div>
                            <div class="row" style="margin-top: 30px">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
                                    <p for="muñeca" class="text-left" style="font-size: 18px" ><strong>Muñeca (cm):</strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 ">
                                    <input type="text" class="form-control" name="muñeca"  style="font-size: 18px"placeholder="Muñeca">
                                </div>
                            </div>
                            <div class="panel-heading" style="margin-top:40px;background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                <p style="margin-bottom: 0px;font-size: 18px"><strong>Otras medidas</strong></p>
                            </div>
                            <div class="row" style="margin-top: 30px">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
                                    <p for="peso" class="text-left" style="font-size: 18px;"><strong>Peso (kgs):</strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 ">
                                    <input type="text" class="form-control " name="peso" style="font-size: 18px" placeholder="Peso" required>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 18px">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
                                    <p for="masagrasa"  class="text-left" style="font-size: 18px;" ><strong>M. Grasa por bioimpedancia (%):</strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 ">
                                    <input type="text" class="form-control" name="masaGrasa" style="font-size: 18px" placeholder="Masa grasa %">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 18px">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
                                    <p for="plieguesAbdominales"   class="text-left" style="font-size: 18px;" ><strong>Pliegues abdominales (mm):</strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 ">
                                    <input type="text" class="form-control" name="plieguesAbdominales" style="font-size: 18px" placeholder="P. abdominales">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 ">
                            <img src="\images\muñeco.png" style="height: 400px; width: 400px; margin-top: -5px">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 ">
                            <div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                <p style="margin-bottom: 0px;font-size: 18px"><strong>Perímetro</strong></p>
                            </div>
                            <div class="row" style="margin-top: 30px">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
                                    <p for="brazo" class="text-left" style="font-size: 18px;"><strong>Brazo (cm):</strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 ">
                                    <input type="text" class="form-control" style="font-size: 18px" name="brazo" placeholder="Brazo">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 18px">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
                                    <p for="cintura"  class="text-left" style="font-size: 18px;"><strong>Cintura (cm):</strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 ">
                                    <input type="text" class="form-control" style="font-size: 18px"name="cintura" placeholder="Cintura">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 18px">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
                                    <p for="cadera"   class="text-left" style="font-size: 18px;" ><strong>Cadera (cm):</strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 ">
                                    <input type="text" class="form-control" name="cadera" style="font-size: 18px"placeholder="Cadera">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 18px">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
                                    <p for="muslo"   class="text-left" style="font-size: 18px;" ><strong>Muslo (cm):</strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 ">
                                    <input type="text" class="form-control" name="muslo" style="font-size: 18px" placeholder="Muslo">
                                </div>
                            </div>
                            <div class="row" style="margin-top: 18px">
                                <div class="col-lg-5 col-md-5 col-sm-5 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
                                    <p for="gemelarMedio" class="text-left" style="font-size: 18px;" ><strong>Gemelar medio (cm):</strong></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 ">
                                    <input type="text" class="form-control" name="gemelarMedio" style="font-size: 18px" placeholder="Gemelar medio">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-5 col-lg-offset-5 col-sm-offset-5">
                            <button style="border: none" class="button" type="submit" data-toggle="tooltip" data-placement="auto" title="Guardar observación">
                                <img src="\images\btns\si2.png" style="width: 90px;height: 90px;border: 0px;">
                            </button>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1">
                            <a href="{{route('pacientes.showPacienteObservacion',$paciente_id)}}" data-toggle="tooltip" data-placement="auto" title="Cancelar">
                                <img src="\images\btns\no2.png" style="width: 90px;height: 90px;border: 0px;">
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection