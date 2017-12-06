@extends('layouts.app')
<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Marvel" rel="stylesheet">
<link src="/css/bootstrap.min.css">
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.min.js"></script>

<!--FUNCION DESPLEGABLE-->
<script>
    $(document).ready(function(){
        for(var i=0;i<8; i++){
            $("#desplegable"+i).css({display:'none'});
        }
    });
    function desplegable(d){
        $("#desplegable"+d).slideToggle("slow");
        return false;
    }
    function cambiarEstado(checkbox,id,id2,id3,id4){
        document.getElementById(id).disabled = !checkbox.checked;
        document.getElementById(id2).disabled = !checkbox.checked;
        document.getElementById(id3).disabled = !checkbox.checked;
        document.getElementById(id4).disabled = !checkbox.checked;
    }
    <!--FUNCION BUSCADOR -->
    function buscadorFu(string1,string2){
        console.log(string1+' '+string2);
        var input, filter, table, tr, tbody, label, i;
        input = $('#'+string1);
        filter = input.val().toUpperCase();
        tbody=$("#"+string2);
        tr = tbody.find("tr");
        for (i = 0; i < tr.length; i++) {
            label = $(tr[i]).find("label[name='nombreEjercicio']")[0];
            if (label) {
                if($(tr[i]).find("input[type=checkbox]").is(":checked")){
                    $(tr[i]).show();
                }
                else if(filter==""){
                    $(tr[i]).hide();
                }
                else if (label.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    $(tr[i]).show();
                } else {
                    $(tr[i]).hide();
                }
            }
        }
    }
</script>

<style>
    html, body {
        background-image: url("/images/fondos/sport2.jpg");
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
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <p  style="font-size: 40px;text-align: center;margin-bottom: 0px;">Nuevo entrenamiento</p>
                    </div>
                </div>
            </div>

            <!--CUERPO-->
            <div class="panel-body" style="font-family: 'Marvel', sans-serif;color:black;">
                <div class="row">
                    <form class="form-horizontal" role="form" method="post" action="{{route('pacientes.storeEntrenamiento',$paciente_id)}}">
                    {{ csrf_field() }}

                    <!--INFORMACION DEL ENTRENAMIENTO-->
                        <div name="INFORMACION DE ENTRENAMIENTO">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-5 col-md-5 col-sm-5 text-left">
                                    <div class="panel-heading pull-left" style="margin-bottom: 10px;background-color:rgba(227, 170, 89, 0.23);height: 51px;">
                                        <p  style="margin-bottom: 0px;font-size: 20px"><strong>Información del entrenamiento:</strong></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top: 20px; margin-bottom: 20px">
                                <div class="col-lg-3 col-md-3 col-sm-3 text-left" style="width: 370px">
                                    <p  style="font-size: 20px; padding-left: 20px"><strong>Descripción del entrenamiento:</strong></p>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-9 text-left" style="margin-left: -20px">
                                    <input type="text" class=" form-control" style="font-size: 20px;" name="descripcion" placeholder="Descripción">
                                </div>
                            </div>
                        </div>

                        <!--CREAR ENTRENAMIENTO-->
                        <!--LUNES-->
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="panel-heading" style="background-color:rgba(117, 178, 212, 0.41);height: 51px;">
                                    <div class="row">
                                        <p  class="col-lg-11 col-md-11 col-sm-11 text-center" style="margin-bottom: 0px;font-size: 20px; color:black;padding-left: 150px">
                                            <strong>LUNES</strong>
                                        </p>
                                        <a class="col-lg-1 col-md-1 col-sm-1 text-center" href="#" id="dias1" onclick="return desplegable(1)"  style="margin-top: 5px">
                                            <span class="glyphicon glyphicon-list"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="desplegable1">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-12 col-md-12 col-sm-12 text-left ">
                                    <p style="font-size: 20px; padding-left: 20px"><strong>Seleccionar ejercicios:</strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table  table-hover">
                                    <thead style="font-size: 20px; color: black">
                                    <tr>
                                        <th class="col-lg-3 col-md-3 col-sm-3 text-center">
                                            Ejercicio
                                        </th>
                                        <th class="col-lg-2 col-md-2 col-sm-2 text-center">
                                            Repeticiones
                                        </th>
                                        <th class="col-lg-6 col-md-6 col-sm-6 text-center">
                                            Comentario
                                        </th>
                                        <th class="col-lg-1 col-md-1 col-sm-1 text-center">
                                            Incluir
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-3 col-md-3 col-sm-3 text-center" style="padding-left: 20px">
                                            <input class="form-control"  type="text" id="buscador1" onkeyup="buscadorFu('buscador1','tab_logic1')" placeholder="Buscar ejercicio" style="font-size: 20px">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </thead>
                                    <tbody style="font-size: 20px; color:black" id="tab_logic1">
                                    @foreach($ejercicios as $e)
                                        <?php
                                        $i=uniqid();
                                        $eji='ejer'.$i;
                                        $rid='rep'.$i;
                                        $cid='comm'.$i;
                                        $dia_semanaid='dia_semana'.$i;
                                        ?>
                                        <tr style="font-size: 20px; display: none" >
                                            <td   name="ejercicios"  style="display:none;">
                                                <input id="{{'ejer'.$i}}" disabled type="hidden" name="ejercicios[]"  value="{{$e->id}}" />
                                            </td>
                                            <td name="ocultos" style="display:none;">
                                                <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="lunes" style="font-size: 20px"/>
                                                <input  disabled type="hidden" name="duracion"   value="{{$e->duracion}}"/>
                                                <input  disabled type="hidden" name="calorias" class="form-control"  value="{{$e->calorias}}"/>
                                            </td>
                                            <td   name="ejercicios"  class="text-center" style="font-size: 20px" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                                <label name="nombreEjercicio" style="font-size: 20px">{{$e->nombre}}</label>
                                                <label name="dur" > {{$e->duracion.' minutos'}}</label>
                                            </td>
                                            <td   name="repeticion"  style="font-size: 20px" class="col-lg-2 col-md-2 col-sm-2 text-center">
                                                <input id="{{'rep'.$i}}" disabled style="font-size: 20px" type="text" name='repeticion[]' placeholder='Repetición' class="form-control"/>
                                            </td>
                                            <td   name="comentario"  style="font-size: 20px" class="col-lg-6 col-md-6 col-sm-6 text-center">
                                                <input id="{{'comm'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                            </td>
                                            <td  class="col-lg-1 col-md-1 col-sm-1 text-center">
                                                <input  type="checkbox" value="" onclick="cambiarEstado(this,'{{$eji}}','{{$rid}}','{{$cid}}','{{$dia_semanaid}}')">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!--MARTES-->
                        <div class="row" style="margin-top: 10px">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="panel-heading" style="background-color:rgba(117, 178, 212, 0.41);height: 51px;">
                                    <div class="row">
                                        <p  class="col-lg-11 col-md-11 col-sm-11 text-center" style="margin-bottom: 0px;font-size: 20px; color:black;padding-left: 150px">
                                            <strong>MARTES</strong>
                                        </p>
                                        <a class="col-lg-1 col-md-1 col-sm-1 text-center" href="#" id="dias2" onclick="return desplegable(2)"  style="margin-top: 5px">
                                            <span class="glyphicon glyphicon-list"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="desplegable2">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-12 col-md-12 col-sm-12 text-left ">
                                    <p style="font-size: 20px; padding-left: 20px"><strong>Seleccionar ejercicios:</strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table  table-hover">
                                    <thead style="font-size: 20px; color: black">
                                    <tr>
                                        <th class="col-lg-3 col-md-3 col-sm-3 text-center">
                                            Ejercicio
                                        </th>
                                        <th class="col-lg-2 col-md-2 col-sm-2 text-center">
                                            Repeticiones
                                        </th>
                                        <th class="col-lg-6 col-md-6 col-sm-6 text-center">
                                            Comentario
                                        </th>
                                        <th class="col-lg-1 col-md-1 col-sm-1 text-center">
                                            Incluir
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-3 col-md-3 col-sm-3 text-center" style="padding-left: 20px">
                                            <input class="form-control"  type="text" id="buscador2" onkeyup="buscadorFu('buscador2','tab_logic2')" placeholder="Buscar ejercicio" style="font-size: 20px">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </thead>
                                    <tbody style="font-size: 20; color:black" id="tab_logic2">
                                    @foreach($ejercicios as $e)
                                        <?php
                                        $i=uniqid();
                                        $eji='ejer'.$i;
                                        $rid='rep'.$i;
                                        $cid='comm'.$i;
                                        $dia_semanaid='dia_semana'.$i;
                                        ?>
                                        <tr style="font-size: 20px; display: none" >
                                            <td   name="ejercicios"  style="display:none;">
                                                <input id="{{'ejer'.$i}}" disabled type="hidden" name="ejercicios[]"  value="{{$e->id}}" />
                                            </td>
                                            <td name="ocultos" style="display:none;">
                                                <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="martes" style="font-size: 20px"/>
                                                <input  disabled type="hidden" name="duracion"   value="{{$e->duracion}}"/>
                                                <input  disabled type="hidden" name="calorias" class="form-control"  value="{{$e->calorias}}"/>
                                            </td>
                                            <td   name="ejercicios"  class="text-center" style="font-size: 20px" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                                <label name="nombreEjercicio" style="font-size: 20px">{{$e->nombre}}</label>
                                                <label name="dur" > {{$e->duracion.' minutos'}}</label>
                                            </td>
                                            <td   name="repeticion"  style="font-size: 20px" class="col-lg-2 col-md-2 col-sm-2 text-center">
                                                <input id="{{'rep'.$i}}" disabled style="font-size: 20px" type="text" name='repeticion[]' placeholder='Repetición' class="form-control"/>
                                            </td>
                                            <td   name="comentario"  style="font-size: 20px" class="col-lg-6 col-md-6 col-sm-6 text-center">
                                                <input id="{{'comm'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                            </td>
                                            <td  class="col-lg-1 col-md-1 col-sm-1 text-center">
                                                <input  type="checkbox" value="" onclick="cambiarEstado(this,'{{$eji}}','{{$rid}}','{{$cid}}','{{$dia_semanaid}}')">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!--MIERCOLES-->
                        <div class="row" style="margin-top: 10px">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="panel-heading" style="background-color:rgba(117, 178, 212, 0.41);height: 51px;">
                                    <div class="row">
                                        <p  class="col-lg-11 col-md-11 col-sm-11 text-center" style="margin-bottom: 0px;font-size: 20px; color:black;padding-left: 150px">
                                            <strong>MIÉRCOLES</strong>
                                        </p>
                                        <a class="col-lg-1 col-md-1 col-sm-1 text-center" href="#" id="dias3" onclick="return desplegable(3)"  style="margin-top: 5px">
                                            <span class="glyphicon glyphicon-list"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="desplegable3">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-12 col-md-12 col-sm-12 text-left ">
                                    <p style="font-size: 20px; padding-left: 20px"><strong>Seleccionar ejercicios:</strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table  table-hover">
                                    <thead style="font-size: 20px;color: black">
                                    <tr>
                                        <th class="col-lg-3 col-md-3 col-sm-3 text-center">
                                            Ejercicio
                                        </th>
                                        <th class="col-lg-2 col-md-2 col-sm-2 text-center">
                                            Repeticiones
                                        </th>
                                        <th class="col-lg-6 col-md-6 col-sm-6 text-center">
                                            Comentario
                                        </th>
                                        <th class="col-lg-1 col-md-1 col-sm-1 text-center">
                                            Incluir
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-3 col-md-3 col-sm-3 text-center" style="padding-left: 20px">
                                            <input class="form-control"  type="text" id="buscador3" onkeyup="buscadorFu('buscador3','tab_logic3')" placeholder="Buscar ejercicio" style="font-size: 20px">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </thead>
                                    <tbody style="font-size: 20px; color:black" id="tab_logic3">
                                    @foreach($ejercicios as $e)
                                        <?php
                                        $i=uniqid();
                                        $eji='ejer'.$i;
                                        $rid='rep'.$i;
                                        $cid='comm'.$i;
                                        $dia_semanaid='dia_semana'.$i;
                                        ?>
                                        <tr style="font-size: 20px; display: none" >
                                            <td   name="ejercicios"  style="display:none;">
                                                <input id="{{'ejer'.$i}}" disabled type="hidden" name="ejercicios[]"  value="{{$e->id}}" />
                                            </td>
                                            <td name="ocultos" style="display:none;">
                                                <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="miercoles" style="font-size: 20px"/>
                                                <input  disabled type="hidden" name="duracion"   value="{{$e->duracion}}"/>
                                                <input  disabled type="hidden" name="calorias" class="form-control"  value="{{$e->calorias}}"/>
                                            </td>
                                            <td   name="ejercicios"  class="text-center" style="font-size: 20px" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                                <label name="nombreEjercicio" style="font-size: 20px">{{$e->nombre}}</label>
                                                <label name="dur" > {{$e->duracion.' minutos'}}</label>
                                            </td>
                                            <td   name="repeticion"  style="font-size: 20px" class="col-lg-2 col-md-2 col-sm-2 text-center">
                                                <input id="{{'rep'.$i}}" disabled style="font-size: 20px" type="text" name='repeticion[]' placeholder='Repetición' class="form-control"/>
                                            </td>
                                            <td   name="comentario"  style="font-size: 20px" class="col-lg-6 col-md-6 col-sm-6 text-center">
                                                <input id="{{'comm'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                            </td>
                                            <td  class="col-lg-1 col-md-1 col-sm-1 text-center">
                                                <input  type="checkbox" value="" onclick="cambiarEstado(this,'{{$eji}}','{{$rid}}','{{$cid}}','{{$dia_semanaid}}')">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!--JUEVES-->
                        <div class="row" style="margin-top: 10px">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="panel-heading" style="background-color:rgba(117, 178, 212, 0.41);height: 51px;">
                                    <div class="row">
                                        <p  class="col-lg-11 col-md-11 col-sm-11 text-center" style="margin-bottom: 0px;font-size: 20px; color:black;padding-left: 150px">
                                            <strong>JUEVES</strong>
                                        </p>
                                        <a class="col-lg-1 col-md-1 col-sm-1 text-center" href="#" id="dias4" onclick="return desplegable(4)"  style="margin-top: 5px">
                                            <span class="glyphicon glyphicon-list"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="desplegable4">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-12 col-md-12 col-sm-12 text-left ">
                                    <p style="font-size: 20px; padding-left: 20px"><strong>Seleccionar ejercicios:</strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table  table-hover">
                                    <thead style="font-size: 20px;color: black">
                                    <tr>
                                        <th class="col-lg-3 col-md-3 col-sm-3 text-center">
                                            Ejercicio
                                        </th>
                                        <th class="col-lg-2 col-md-2 col-sm-2 text-center">
                                            Repeticiones
                                        </th>
                                        <th class="col-lg-6 col-md-6 col-sm-6 text-center">
                                            Comentario
                                        </th>
                                        <th class="col-lg-1 col-md-1 col-sm-1 text-center">
                                            Incluir
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-3 col-md-3 col-sm-3 text-center" style="padding-left: 20px">
                                            <input class="form-control"  type="text" id="buscador4" onkeyup="buscadorFu('buscador4','tab_logic4')" placeholder="Buscar ejercicio" style="font-size: 20px">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </thead>
                                    <tbody style="font-size: 20px; color:black" id="tab_logic4">
                                    @foreach($ejercicios as $e)
                                        <?php
                                        $i=uniqid();
                                        $eji='ejer'.$i;
                                        $rid='rep'.$i;
                                        $cid='comm'.$i;
                                        $dia_semanaid='dia_semana'.$i;
                                        ?>
                                        <tr style="font-size: 20px; display: none" >
                                            <td   name="ejercicios"  style="display:none;">
                                                <input id="{{'ejer'.$i}}" disabled type="hidden" name="ejercicios[]"  value="{{$e->id}}" />
                                            </td>
                                            <td name="ocultos" style="display:none;">
                                                <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="jueves" style="font-size: 20px"/>
                                                <input  disabled type="hidden" name="duracion"   value="{{$e->duracion}}"/>
                                                <input  disabled type="hidden" name="calorias" class="form-control"  value="{{$e->calorias}}"/>
                                            </td>
                                            <td   name="ejercicios"  class="text-center" style="font-size: 20px" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                                <label name="nombreEjercicio" style="font-size: 20px">{{$e->nombre}}</label>
                                                <label name="dur" > {{$e->duracion.' minutos'}}</label>
                                            </td>
                                            <td   name="repeticion"  style="font-size: 20px" class="col-lg-2 col-md-2 col-sm-2 text-center">
                                                <input id="{{'rep'.$i}}" disabled style="font-size: 20px" type="text" name='repeticion[]' placeholder='Repetición' class="form-control"/>
                                            </td>
                                            <td   name="comentario"  style="font-size: 20px" class="col-lg-6 col-md-6 col-sm-6 text-center">
                                                <input id="{{'comm'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                            </td>
                                            <td  class="col-lg-1 col-md-1 col-sm-1 text-center">
                                                <input  type="checkbox" value="" onclick="cambiarEstado(this,'{{$eji}}','{{$rid}}','{{$cid}}','{{$dia_semanaid}}')">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!--VIERNES-->
                        <div class="row" style="margin-top: 10px">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="panel-heading" style="background-color:rgba(117, 178, 212, 0.41);height: 51px;">
                                    <div class="row">
                                        <p  class="col-lg-11 col-md-11 col-sm-11 text-center" style="margin-bottom: 0px;font-size: 20px; color:black;padding-left: 150px">
                                            <strong>VIERNES</strong>
                                        </p>
                                        <a class="col-lg-1 col-md-1 col-sm-1 text-center" href="#" id="dias5" onclick="return desplegable(5)"  style="margin-top: 5px">
                                            <span class="glyphicon glyphicon-list"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="desplegable5">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-12 col-md-12 col-sm-12 text-left ">
                                    <p style="font-size: 20px;padding-left: 20px"><strong>Seleccionar ejercicios:</strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table  table-hover">
                                    <thead style="font-size: 20px;color: black">
                                    <tr>
                                        <th class="col-lg-3 col-md-3 col-sm-3 text-center">
                                            Ejercicio
                                        </th>
                                        <th class="col-lg-2 col-md-2 col-sm-2 text-center">
                                            Repeticiones
                                        </th>
                                        <th class="col-lg-6 col-md-6 col-sm-6 text-center">
                                            Comentario
                                        </th>
                                        <th class="col-lg-1 col-md-1 col-sm-1 text-center">
                                            Incluir
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-3 col-md-3 col-sm-3 text-center" style="padding-left: 20px">
                                            <input class="form-control"  type="text" id="buscador5" onkeyup="buscadorFu('buscador5','tab_logic5')" placeholder="Buscar ejercicio" style="font-size: 20px">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </thead>
                                    <tbody style="font-size: 20px; color:black" id="tab_logic5">
                                    @foreach($ejercicios as $e)
                                        <?php
                                        $i=uniqid();
                                        $eji='ejer'.$i;
                                        $rid='rep'.$i;
                                        $cid='comm'.$i;
                                        $dia_semanaid='dia_semana'.$i;
                                        ?>
                                        <tr style="font-size: 20px; display: none" >
                                            <td   name="ejercicios"  style="display:none;">
                                                <input id="{{'ejer'.$i}}" disabled type="hidden" name="ejercicios[]"  value="{{$e->id}}" />
                                            </td>
                                            <td name="ocultos" style="display:none;">
                                                <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="viernes" style="font-size: 20px"/>
                                                <input  disabled type="hidden" name="duracion"   value="{{$e->duracion}}"/>
                                                <input  disabled type="hidden" name="calorias" class="form-control"  value="{{$e->calorias}}"/>
                                            </td>
                                            <td   name="ejercicios"  class="text-center" style="font-size: 20px" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                                <label name="nombreEjercicio" style="font-size: 20px">{{$e->nombre}}</label>
                                                <label name="dur" > {{$e->duracion.' minutos'}}</label>
                                            </td>
                                            <td   name="repeticion"  style="font-size: 20px" class="col-lg-2 col-md-2 col-sm-2 text-center">
                                                <input id="{{'rep'.$i}}" disabled style="font-size: 20px" type="text" name='repeticion[]' placeholder='Repetición' class="form-control"/>
                                            </td>
                                            <td   name="comentario"  style="font-size: 20px" class="col-lg-6 col-md-6 col-sm-6 text-center">
                                                <input id="{{'comm'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                            </td>
                                            <td  class="col-lg-1 col-md-1 col-sm-1 text-center">
                                                <input  type="checkbox" value="" onclick="cambiarEstado(this,'{{$eji}}','{{$rid}}','{{$cid}}','{{$dia_semanaid}}')">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!--SABADO-->
                        <div class="row" style="margin-top: 10px">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="panel-heading" style="background-color:rgba(117, 178, 212, 0.41);height: 51px;">
                                    <div class="row">
                                        <p  class="col-lg-11 col-md-11 col-sm-11 text-center" style="margin-bottom: 0px;font-size: 20px; color:black;padding-left: 150px">
                                            <strong>SÁBADO</strong>
                                        </p>
                                        <a class="col-lg-1 col-md-1 col-sm-1 text-center" href="#" id="dias6" onclick="return desplegable(6)"  style="margin-top: 5px">
                                            <span class="glyphicon glyphicon-list"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="desplegable6">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-12 col-md-12 col-sm-12 text-left ">
                                    <p style="font-size: 20px;padding-left: 20px"><strong>Seleccionar ejercicios:</strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table  table-hover">
                                    <thead style="font-size: 20px;color: black">
                                    <tr>
                                        <th class="col-lg-3 col-md-3 col-sm-3 text-center">
                                            Ejercicio
                                        </th>
                                        <th class="col-lg-2 col-md-2 col-sm-2 text-center">
                                            Repeticiones
                                        </th>
                                        <th class="col-lg-6 col-md-6 col-sm-6 text-center">
                                            Comentario
                                        </th>
                                        <th class="col-lg-1 col-md-1 col-sm-1 text-center">
                                            Incluir
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-3 col-md-3 col-sm-3 text-center" style="padding-left: 20px">
                                            <input class="form-control"  type="text" id="buscador6" onkeyup="buscadorFu('buscador6','tab_logic6')" placeholder="Buscar ejercicio" style="font-size: 20px">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </thead>
                                    <tbody style="font-size: 20px; color:black" id="tab_logic6">
                                    @foreach($ejercicios as $e)
                                        <?php
                                        $i=uniqid();
                                        $eji='ejer'.$i;
                                        $rid='rep'.$i;
                                        $cid='comm'.$i;
                                        $dia_semanaid='dia_semana'.$i;
                                        ?>
                                        <tr style="font-size: 20px; display: none" >
                                            <td   name="ejercicios"  style="display:none;">
                                                <input id="{{'ejer'.$i}}" disabled type="hidden" name="ejercicios[]"  value="{{$e->id}}" />
                                            </td>
                                            <td name="ocultos" style="display:none;">
                                                <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="sabado" style="font-size: 20px"/>
                                                <input  disabled type="hidden" name="duracion"   value="{{$e->duracion}}"/>
                                                <input  disabled type="hidden" name="calorias" class="form-control"  value="{{$e->calorias}}"/>
                                            </td>
                                            <td   name="ejercicios"  class="text-center" style="font-size: 20px" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                                <label name="nombreEjercicio" style="font-size: 20px">{{$e->nombre}}</label>
                                                <label name="dur" > {{$e->duracion.' minutos'}}</label>
                                            </td>
                                            <td   name="repeticion"  style="font-size: 20px" class="col-lg-2 col-md-2 col-sm-2 text-center">
                                                <input id="{{'rep'.$i}}" disabled style="font-size: 20px" type="text" name='repeticion[]' placeholder='Repetición' class="form-control"/>
                                            </td>
                                            <td   name="comentario"  style="font-size: 20px" class="col-lg-6 col-md-6 col-sm-6 text-center">
                                                <input id="{{'comm'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                            </td>
                                            <td  class="col-lg-1 col-md-1 col-sm-1 text-center">
                                                <input  type="checkbox" value="" onclick="cambiarEstado(this,'{{$eji}}','{{$rid}}','{{$cid}}','{{$dia_semanaid}}')">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!--DOMINGO-->
                        <div class="row" style="margin-top: 10px">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="panel-heading" style="background-color:rgba(117, 178, 212, 0.41);height: 51px;">
                                    <div class="row">
                                        <p  class="col-lg-11 col-md-11 col-sm-11 text-center" style="margin-bottom: 0px;font-size: 20px; color:black;padding-left: 150px">
                                            <strong>DOMINGO</strong>
                                        </p>
                                        <a class="col-lg-1 col-md-1 col-sm-1 text-center" href="#" id="dias7" onclick="return desplegable(7)"  style="margin-top: 5px">
                                            <span class="glyphicon glyphicon-list"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="desplegable7">
                            <div class="row" style="margin-top: 20px">
                                <div class="col-lg-12 col-md-12 col-sm-12 text-left ">
                                    <p style="font-size: 20px; padding-left: 20px"><strong>Seleccionar ejercicios:</strong></p>
                                </div>
                            </div>
                            <div class="row">
                                <table class="table  table-hover">
                                    <thead style="font-size: 20px;color: black">
                                    <tr>
                                        <th class="col-lg-3 col-md-3 col-sm-3 text-center">
                                            Ejercicio
                                        </th>
                                        <th class="col-lg-2 col-md-2 col-sm-2 text-center">
                                            Repeticiones
                                        </th>
                                        <th class="col-lg-6 col-md-6 col-sm-6 text-center">
                                            Comentario
                                        </th>
                                        <th class="col-lg-1 col-md-1 col-sm-1 text-center">
                                            Incluir
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="col-lg-3 col-md-3 col-sm-3 text-center" style="padding-left: 20px">
                                            <input class="form-control"  type="text" id="buscador7" onkeyup="buscadorFu('buscador7','tab_logic7')" placeholder="Buscar ejercicio" style="font-size: 20px">
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </thead>
                                    <tbody style="font-size: 20px; color:black" id="tab_logic7">
                                    @foreach($ejercicios as $e)
                                        <?php
                                        $i=uniqid();
                                        $eji='ejer'.$i;
                                        $rid='rep'.$i;
                                        $cid='comm'.$i;
                                        $dia_semanaid='dia_semana'.$i;
                                        ?>
                                        <tr style="font-size: 20px; display: none" >
                                            <td   name="ejercicios"  style="display:none;">
                                                <input id="{{'ejer'.$i}}" disabled type="hidden" name="ejercicios[]"  value="{{$e->id}}" />
                                            </td>
                                            <td name="ocultos" style="display:none;">
                                                <input id="{{'dia_semana'.$i}}" disabled type="hidden" name="dia_semana[]" class="form-control"  value="domingo" style="font-size: 20px"/>
                                                <input  disabled type="hidden" name="duracion"   value="{{$e->duracion}}"/>
                                                <input  disabled type="hidden" name="calorias" class="form-control"  value="{{$e->calorias}}"/>
                                            </td>
                                            <td   name="ejercicios"  class="text-center" style="font-size: 20px" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                                <label name="nombreEjercicio" style="font-size: 20px">{{$e->nombre}}</label>
                                                <label name="dur" > {{$e->duracion.' minutos'}}</label>
                                            </td>
                                            <td   name="repeticion"  style="font-size: 20px" class="col-lg-2 col-md-2 col-sm-2 text-center">
                                                <input id="{{'rep'.$i}}" disabled style="font-size: 20px" type="text" name='repeticion[]' placeholder='Repetición' class="form-control"/>
                                            </td>
                                            <td   name="comentario"  style="font-size: 20px" class="col-lg-6 col-md-6 col-sm-6 text-center">
                                                <input id="{{'comm'.$i}}" disabled style="font-size: 20px" type="text" name='comentario[]' placeholder='Comentario' class="form-control"/>
                                            </td>
                                            <td  class="col-lg-1 col-md-1 col-sm-1 text-center">
                                                <input  type="checkbox" value="" onclick="cambiarEstado(this,'{{$eji}}','{{$rid}}','{{$cid}}','{{$dia_semanaid}}')">
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!--BOTONES-->
                        <div class="row" style="margin-top: 10px">
                            <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-5 col-lg-offset-5 col-sm-offset-5">
                                <button style="border: none" class="button" type="submit" data-toggle="tooltip" data-placement="auto" title="Guardar entrenamiento">
                                    <img src="\images\btns\si2.png" style="width: 100px;height: 100px;border: 0px;">
                                </button>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-1">
                                <a href="{{route('pacientes.showPacienteObservacion',$paciente_id)}}" data-toggle="tooltip" data-placement="auto" title="Cancelar">
                                    <img src="\images\btns\no2.png" style="width: 100px;height: 100px;border: 0px;">
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


