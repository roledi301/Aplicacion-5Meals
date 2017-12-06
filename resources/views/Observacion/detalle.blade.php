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
                    <div class="col-lg-11 col-md-11 col-sm-11 text-center" style="padding-left: 100px">
                        <p  style="font-size: 40px;text-align: center;margin-bottom: 0px;">
                            Información de la observación</p>
                        </p>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1" style="margin-top: -10px;text-align: right">
                        <a href="{{route('pacientes.showObservaciones',$observacion->paciente_id)}}" data-toggle="tooltip" data-placement="auto" title="Volver al historial de observaciones">
                            <img src="\images\btns\volver.png" style="width: 80px;height: 80px;border: 0px;padding-left: 0px;">
                        </a>
                    </div>
                </div>
            </div>
            <!--CUERPO-->
            <div class="panel-body">
                <div class="panel-body" style="font-size:18px;font-family: 'Marvel', sans-serif;color: #000000;">

                    <div class="row" style="margin-top: -5px">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 text-center">
                            <p><strong>Fecha de la observación:</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{$observacion->created_at->format('d-m-Y')}}</p>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-3 col-lg-offset-3 col-sm-offset-3 text-right">
                            <a href="{{route('observaciones.edit',$observacion->id)}}" role="button" class="btn" style="padding: 0px; border: none"
                               data-toggle="tooltip" data-placement="auto" title="Editar observación">
                                <img src="\images\btns\editar2.png" style=";width:70px;height:70px; border: 0px;margin-top:-30px;">
                            </a>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 5px">
                        <div class="col-lg-3 col-md-3 col-sm-3 ">
                            <div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                <p style="margin-bottom: 0px;font-size: 18px"><strong>Datos nutricionales</strong></p>
                            </div>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 text-left">
                                    <p><strong>IMC:</strong></p>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 text-left">
                                    <p>{{number_format($observacion->getImcAttribute($observacion->paciente_id),2,",","")
                                        .''."&nbsp;&nbsp;&nbsp;Kg/m²"}}</p>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 text-left">
                                    <p><strong>TMR:</strong></p>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 text-left">
                                    <p>{{number_format($observacion->getTmrAttribute($observacion->paciente_id),2,",","")}}</p>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 text-left">
                                    <p><strong>AF:</strong></p>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 text-left">
                                    <p>{{$observacion->getAfAttribute($observacion->paciente_id)}}</p>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 text-left">
                                    <p><strong>GET:</strong></p>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-2 text-left ">
                                    <p>{{number_format( $observacion->getGetAttribute($observacion->paciente_id),2,",","")
                                       .''."&nbsp;&nbsp;&nbsp;Kcal/día"}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                            <div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                                <p style="margin-bottom: 0px;font-size: 20px"><strong>Tabla de Quetelet </strong></p>
                            </div>
                            <table class="table table-hover col-lg-10 col-md-10 col-sm-10 col-md-offset-1 col-lg-offset-1 col-sm-offset-1" style="border: none;margin-bottom: 0px;">
                                <thead style="font-size:20px;color: black ">
                                <tr>
                                    <th style="border: none">Clasificación</th>
                                    <th  style="border: none;">IMC (Kg/m²)</th>
                                </tr>
                                </thead>
                                <tbody  style="font-size:20px;color: black; border: none;">
                                <tr>
                                    <td  style="border: none;padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 8px;">Bajo peso</td>
                                    <td style="border: none; padding: 0px;padding-left: 8px">< 20,50</td>
                                </tr>
                                <tr>
                                    <td  style="border: none;padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 8px;">Delgadez severa</td>
                                    <td style="border: none;padding: 0px;padding-left: 8px">< 16,00</td>
                                </tr>
                                <tr>
                                    <td style="border: none;padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 8px;">Delgadez moderada</td>
                                    <td style="border: none;padding: 0px;padding-left: 8px">16,00 - 16,99</td>
                                </tr>
                                <tr>
                                    <td style="border: none;padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 8px;">Delgadez leve</td>
                                    <td style="border: none;padding: 0px;padding-left: 8px">17,00 - 20,49</td>
                                </tr>
                                <tr>
                                    <td style="border: none;padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 8px;">Normal</td>
                                    <td style="border: none;padding: 0px;padding-left: 8px">20,5 - 24,99</td>
                                </tr>
                                <tr>
                                    <td style="border: none;padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 8px;">Sobrepeso</td>
                                    <td style="border: none;padding: 0px;padding-left: 8px">≥ 25,00</td>
                                </tr>
                                <tr>
                                    <td style="border: none;padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 8px;">Preobeso</td>
                                    <td style="border: none;padding: 0px;padding-left: 8px">25,00 - 29,99</td>
                                </tr>
                                <tr>
                                    <td style="border: none;padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 8px;">Obesidad</td>
                                    <td  style="border: none;padding: 0px;padding-left: 8px">≥ 30,00</td>
                                </tr>
                                <tr>
                                    <td  style="border: none;padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 8px;">Obesidad leve</td>
                                    <td  style="border: none;padding: 0px;padding-left: 8px">30,00 - 34,99</td>
                                </tr>
                                <tr>
                                    <td  style="border: none;padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 8px;">Obesidad media</td>
                                    <td  style="border: none;padding: 0px;padding-left: 8px">35,00 - 39,99</td>
                                </tr>
                                <tr>
                                    <td style="border: none;padding-top: 0px;padding-bottom: 0px;padding-right: 0px;padding-left: 8px;">Obesidad mórbida</td>
                                    <td  style="border: none;padding: 0px;padding-left: 8px">≥ 40,00</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                            <div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);height: 51px;">
                                <p style="margin-bottom: 0px;font-size: 18px"><strong>Medidas antropométricas</strong></p>
                            </div>
                            <div class="row" style="margin-top: 10px">
                                <div class="col-lg-5 col-md-5 col-sm-5" >
                                    <div class=" panel-heading" style="background-color: rgba(227, 170, 89, 0.23);height: 51px;padding-left: 0px;padding-right: 0px;margin-left: 15px;">
                                        <p style="margin-bottom: 0px;font-size: 18px"><strong>Diámetro</strong></p>
                                    </div>
                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-md-offset-2 col-lg-offset-2 col-sm-offset-2 text-left">
                                            <p><strong>Muñeca:</strong></p>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1 text-left">
                                            <p> {{$observacion->muñeca.''."&nbsp;&nbsp;&nbsp;cm"}}</p>
                                        </div>
                                    </div>
                                    <div class="panel-heading" style="background-color: rgba(227, 170, 89, 0.23);height: 51px;padding-left: 0px;padding-right: 0px;margin-left: 15px;">
                                        <p style="margin-bottom: 0px;font-size: 18px"><strong>Perímetro</strong></p>
                                    </div>

                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-md-offset-2 col-lg-offset-2 col-sm-offset-2 text-left">
                                            <p><strong>Brazo:</strong></p>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1 text-left">
                                            <p>{{$observacion->brazo.''."&nbsp;&nbsp;&nbsp;cm"}}</p>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-md-offset-2 col-lg-offset-2 col-sm-offset-2 text-left">
                                            <p><strong>Cintura:</strong></p>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1 text-left">
                                            <p>{{$observacion->cintura.''."&nbsp;&nbsp;&nbsp;cm"}}</p>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-md-offset-2 col-lg-offset-2 col-sm-offset-2 text-left">
                                            <p><strong>Cadera:</strong></p>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1 text-left">
                                            <p>{{$observacion->cadera.''."&nbsp;&nbsp;&nbsp;cm"}}</p>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-md-offset-2 col-lg-offset-2 col-sm-offset-2 text-left">
                                            <p><strong>Muslo:</strong></p>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1 text-left">
                                            <p>{{$observacion->muslo.''."&nbsp;&nbsp;&nbsp;cm"}}</p>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-lg-5 col-md-5 col-sm-5 col-md-offset-2 col-lg-offset-2 col-sm-offset-2 text-left">
                                            <p><strong>Gemelar medio:</strong>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1 text-left">
                                            <p>{{$observacion->gemelarMedio.''."&nbsp;&nbsp;&nbsp;cm"}}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                                    <div class="panel-heading" style="background-color: rgba(227, 170, 89, 0.23);height: 51px;padding-left: 0px;padding-right: 0px;margin-right: 15px;">
                                        <p style="margin-bottom: 0px;font-size: 20px"><strong>Otras medidas</strong></p>
                                    </div>
                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-md-offset-2 col-lg-offset-2 col-sm-offset-2 text-left">
                                            <p><strong>Peso:</strong></p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2  text-left">
                                            <p>{{$observacion->peso.''."&nbsp;&nbsp;&nbsp;Kg"}}</p>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-md-offset-2 col-lg-offset-2 col-sm-offset-2 text-left">
                                            <p><strong>Masa grasa:</strong></p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2  text-left">
                                            <p> {{$observacion->masaGrasa.''."&nbsp;&nbsp;&nbsp;%"}}</p>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-md-offset-2 col-lg-offset-2 col-sm-offset-2 text-left">
                                            <p><strong>Pliegues abdomiales:</strong></p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2  text-left">
                                            <p> {{$observacion->plieguesAbdominales.''."&nbsp;&nbsp;&nbsp;mm"}}</p>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-md-offset-2 col-lg-offset-2 col-sm-offset-2 text-left">
                                            <p><strong>Altura:</strong></p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2  text-left">
                                            <p> {{$observacion->getAlturaAttribute($observacion->paciente_id).''."&nbsp;&nbsp;&nbsp;m"}}</p>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top: 10px">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-md-offset-2 col-lg-offset-2 col-sm-offset-2 text-left">
                                            <p><strong>Actividad física:</strong></p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-sm-2  text-left">
                                            <?php
                                            $act='';
                                            $aux=$observacion->getActividadAttribute($observacion->paciente_id);
                                            if($aux=='ligera'){
                                                $act='Ligera';
                                            }else if($aux=='moderada'){
                                                $act='Moderada';
                                            }else{
                                                $act='Elevada';
                                            }
                                            ?>
                                            <p>{{$act}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection