<!--INFORMACION DEL PACIENTE + MENU DE OPCIONES-->
@extends('layouts.app')
<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Marvel" rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>


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
        <div class="panel panel-default" style="background-color: transparent; border: 0px; box-shadow: none">

            <!--CABECERA-->
            <div class="panel-heading" style=" margin-top:10px;border-radius:5px;border-bottom-width:0px;height: 80px;
                                              color: #555555; font-family: 'Satisfy', cursive;background-color: rgb(178, 226, 225);">
                <div class="row">
                    <div class="col-lg-11 col-md-11 col-sm-11 text-center">
                        <p  style="font-size: 40px;text-align: center;margin-bottom: 0px;">
                            Información del paciente
                        </p>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1" style="margin-top: -10px;text-align: right">
                        <a href="{{route('pacientes.index')}}" data-toggle="tooltip" data-placement="auto" title="Volver al registro de pacientes">
                            <img src="\images\btns\volver.png" style="width: 80px;height: 80px;">
                        </a>
                    </div>
                </div>
            </div>


            <!--CUERPO-->
            <div class="panel-body" style="font-family: 'Marvel', sans-serif;color: #000000;">

                <div class="row" style="margin-top: 10px; margin-bottom: 20px; font-size: 20px">
                    <div class="col-lg-3 col-md-3 col-sm-3 text-left ">
                        <strong>&nbsp;Nombre del paciente:</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{$paciente->nombre}} {{$paciente->apellidos}}
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2  text-left">
                        <strong>Edad:</strong>&nbsp;&nbsp;&nbsp;&nbsp;{{$paciente->edad}} años.
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 ">
                        <div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                            <p style="margin-bottom: 0px;font-size: 20px"><strong>Datos próxima dieta</strong></p>
                        </div>
                        <div class="row" style="margin-top: 20px">
                            <?php
                            $alt =$paciente->altura;
                            $af=$observacion->getAfAttribute($paciente->id);
                            $sexo=$paciente->sexo;
                            $edad=$paciente->getEdadAttribute();
                            ?>
                            <script>
                                $(document).ready(function() {
                                    var imc = 0;
                                    var alt= '<?php echo$alt;?>';
                                    var af='<?php echo$af;?>';
                                    var edad='<?php echo$edad;?>';
                                    var sexo = '<?php echo$sexo;?>';
                                    $("#imc").keyup(function(event) {
                                        imc = $("#imc").val();
                                        $("#peso_ideal").html((imc*Math.pow(alt,2)).toFixed(2)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kg');
                                        var peso_ideal = (imc*Math.pow(alt,2)).toFixed(2);
                                        if(sexo=="Hombre"){
                                            $("#get_ideal").html(((66.4730+(13.751*peso_ideal)+(5.0033*(alt*100))-
                                                (6.755*edad))*(af)).toFixed(3)+' Kcal/día');
                                        }else{
                                            $("#get_ideal").html(((655.0955+(9.463*peso_ideal+(1.8496*(alt*100))-
                                                (4.6756*edad)))*(af)).toFixed(3)+'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kcal/día');
                                        }
                                    });
                                });
                            </script>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-3 col-lg-offset-3 col-sm-offset-3 text-left">
                                <p class="text-left" style="font-size: 20px">
                                    <strong>IMC deseado:</strong>
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 ">
                                <input style=" text-align:center;  border-radius: 5px; background-color: transparent;font-size: 20px" type="text" placeholder="IMC objetivo" name="imc_obj" id="imc">
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-3 col-lg-offset-3 col-sm-offset-3 text-left">
                                <p class="text-left" style="font-size: 20px">
                                    <strong>Peso ideal: </strong>
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 ">
                                <p class="text-center" style="font-size: 20px" id="peso_ideal"></p>
                            </div>
                        </div>
                        <div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);height: 51px;margin-top: 15px ">
                            <p style="font-size: 20px"><strong>Datos última observación</strong></p>
                        </div>
                        <div class="row" style="margin-top: 20px">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-3 col-lg-offset-3 col-sm-offset-3 text-left">
                                <p class="text-left" style="font-size: 20px">
                                    <strong>Fecha: </strong>
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                                <p class="text-left" style="font-size: 20px">{{$observacion->created_at->format('d-m-Y')}}</p>
                            </div>
                        </div>
                        <div class="row" style="margin-top:5px">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-3 col-lg-offset-3 col-sm-offset-3 text-left">
                                <p class="text-left" style="font-size: 20px">
                                    <strong>Altura:</strong>
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                                <p class="text-left"  style="font-size: 20px">{{$paciente->altura}}&nbsp;&nbsp;&nbsp;&nbsp;m</p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-3 col-lg-offset-3 col-sm-offset-3 text-left">
                                <p class="text-left" style="font-size: 20px">
                                    <strong>Peso: </strong>
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                                <p class="text-left"  style="font-size: 20px"> {{$observacion->peso}}&nbsp;&nbsp;&nbsp;&nbsp;Kgs</p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-3 col-lg-offset-3 col-sm-offset-3 text-left">
                                <p class="text-left" style="font-size: 20px">
                                    <strong>IMC: </strong>
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                                <p class="text-left"  style="font-size: 20px">
                                    {{number_format($observacion->getImcAttribute($paciente->id),2,",","")}}&nbsp;&nbsp;&nbsp;&nbsp;Kg/m²</p>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 5px">
                            <div class="col-lg-2 col-md-2 col-sm-2 col-md-offset-3 col-lg-offset-3 col-sm-offset-3 text-left">
                                <p class="text-left" style="font-size: 20px">
                                    <strong>GET:</strong>
                                </p>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                                <p class="text-left" style="font-size: 20px">
                                    {{number_format( $observacion->getGetAttribute($paciente->id),2,",","")}}&nbsp;&nbsp;&nbsp;&nbsp;Kcal/día
                                </p>
                            </div>
                        </div>


                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                        <div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                            <p style="margin-bottom: 0px;font-size: 20px"><strong>Tabla de Quetelet </strong></p>
                        </div>
                        <table class="table table-hover col-lg-10 col-md-10 col-sm-10 col-md-offset-1 col-lg-offset-1 col-sm-offset-1" style="border: none;margin-top: 10px">
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
                    <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                        <div class="panel-heading" style="background-color:rgba(227, 170, 89, 0.23);height: 51px; ">
                            <p style="margin-bottom: 0px;font-size: 20px"><strong>Opciones </strong></p>
                        </div>
                        <div class="row" style="margin-top: 10px">
                            <div class="col-lg-10 col-md-10 col-sm-10 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                                <a href="{{route('pacientes.createObservacion',$paciente->id)}}" data-toggle="tooltip"
                                   data-placement="auto" title="Agregar nueva observación">
                                    <img src="/images/btns/nueva-obs2.png" style="border-radius:10px; width: 350px;margin-bottom: 0px;">
                                </a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-lg-10 col-md-10 col-sm-10 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                                <a href="{{route('pacientes.showObservaciones',$paciente->id)}}" data-toggle="tooltip"
                                   data-placement="auto" title="Ver historial de observaciones">
                                    <img src="/images/btns/h-obser.png" style="border-radius:10px; width: 350px;margin-bottom: 0px;">
                                </a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-lg-10 col-md-10 col-sm-10 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                                <a href="{{route('pacientes.createDieta',$paciente->id)}}" data-toggle="tooltip"
                                   data-placement="auto" title="Agregar nueva dieta">
                                    <img src="/images/btns/n-dieta.png" style="border-radius:10px; width: 350px;margin-bottom: 0px;">
                                </a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-lg-10 col-md-10 col-sm-10 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                                <a href="{{route('pacientes.indexDietas',$paciente->id)}}" data-toggle="tooltip"
                                   data-placement="auto" title="Ver historial de dietas">
                                    <img src="/images/btns/h-dietas.png" style="border-radius:10px; width: 350px;margin-bottom: 0px;">
                                </a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-lg-10 col-md-10 col-sm-10 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                                <a href="{{route('pacientes.createEntrenamiento',$paciente->id)}}" data-toggle="tooltip"
                                   data-placement="auto" title="Agregar nuevo entrenamiento">
                                    <img src="/images/btns/entre.png" style="border-radius:10px; width: 350px;margin-bottom: 0px;">
                                </a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-lg-10 col-md-10 col-sm-10 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                                <a href="{{route('pacientes.indexEntrenamientos',$paciente->id)}}" data-toggle="tooltip"
                                   data-placement="auto" title="Ver historial de entrenamientos">
                                    <img src="/images/btns/h-entre.png" style="border-radius:10px; width: 350px;margin-bottom: 0px;">
                                </a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-lg-10 col-md-10 col-sm-10 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                                <a href="{{route('pacientes.showDatos',$paciente->id)}}" data-toggle="tooltip"
                                   data-placement="auto" title="Ver datos personale">
                                    <img src="/images/btns/d-per.png" style="border-radius:10px; width: 350px;margin-bottom: 0px;">
                                </a>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col-lg-10 col-md-10 col-sm-10 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                                {{ Form::open(['style'=>'margin-bottom: 0px','method' => 'DELETE', 'route' => ['pacientes.destroy',$paciente->id]]) }}
                                {{ Form::image('\images\btns\baja.png', 'name', ['class' => 'btn','onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();', 'style' => 'padding:0px; border:none;border-radius:10px; width: 350px;margin-bottom: 0px;']) }}
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection