<!--LISTAR EJERCICIOS-->
@extends('layouts.app')
<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Marvel" rel="stylesheet">

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
                    <div class="col-lg-11 col-md-11 col-sm-11 text-center">
                        <p  style="font-size: 40px;text-align: center;margin-bottom: 0px;">
                            Registro de ejercicios
                        </p>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1" style="margin-top: -10px;text-align: right">
                        <a href="menu" data-toggle="tooltip" data-placement="auto" title="Volver al menú">
                            <img src="images\btns\volver.png" style="width: 80px;height: 80px;">
                        </a>
                    </div>
                </div>
            </div>

            <!--CUERPO-->
            <div class="panel-body" style="font-family: 'Marvel', sans-serif;color: #000000;">
                <div class="row" style="margin-top: 20px; margin-bottom: 20px">
                    <div class="col-lg-9 col-md-9 col-sm-9">
                        <div class="text-left">
                            <a  href="ejercicios/create" data-toggle="tooltip" data-placement="auto" title="Agregar ejercicio">
                                <img src="images\btns\agregar2.png" style="width: 80px;height: 80px;margin-top: -15px">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-3">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-right">
                                {!! Form::open(['route'=>'ejercicios.index','method'=>'GET','class'=>'navbar-form narvar-left pull right','role'=>'search' ])!!}
                                <div class="form-group">
                                    {!! Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Nombre del ejercicio','style'=>'font-size:20px; width: 250px']) !!}
                                </div>
                                <button class="button " type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="auto"
                                        title="Buscar ejercicio" style="border: none; padding: 0px">
                                    <img src="\images\btns\buscar.png" style="width: 80px;height: 80px;border: 0px;margin-top: -15px">
                                </button>
                                {!! Form::close()!!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row text-center" style="text-align: center">
                    <table class="table table-hover" >
                    @if(isset($ejercicios))

                        <!--TITULOS-->
                            <thead  align="center" style="text-align: center ;background-color: rgba(111, 225, 224, 0.23);font-size: 20px;color: black">
                            <th  style="padding: 0px; padding-top: 10px;border-bottom-width: 0px;" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                <p >Nombre</p>
                            </th>
                            <th style="padding: 0px;padding-top: 10px;border-bottom-width: 0px;" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                <p >Duración</p>
                            </th>
                            <th style="padding: 0px;padding-top: 10px;border-bottom-width: 0px;" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                <p >Calorias</p>
                            </th>
                            <th style="padding: 0px;padding-top: 10px;border-bottom-width: 0px;" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                <p>Opciones</p>
                            </th>
                            </thead>

                            <!--DATOS-->
                            <tbody align="center" style="color: black; font-size: 20px">
                            @foreach($ejercicios as $e)<!--for-->
                            <tr style="font-size: 20px; align-content: center">

                                <td  style="border-bottom-width: 0px;border-top-width: 0px;" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                    <p style="margin-bottom: 0px;margin-top: 15px;" >{{$e->nombre}}</p></td>
                                <td style="border-bottom-width: 0px;border-top-width: 0px;" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                    <p style="margin-bottom: 0px;margin-top: 15px;">{{$e->duracion.' minutos'}}</p></td>
                                <td style="border-bottom-width: 0px;border-top-width: 0px;" class="col-lg-3 col-md-3 col-sm-3 text-center">
                                    <p style="margin-bottom: 0px;margin-top: 15px;">{{$e->calorias}}</p></td>

                                <!--BOTONES-->
                                <td style="border-bottom-width: 0px;border-top-width: 0px;" class="col-lg-3 col-md-3 col-sm-3 text-center" >
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                                            <a href="ejercicios/{{$e->id}}/edit" role="button" class="btn" style="padding: 0px; border: none"
                                               data-toggle="tooltip" data-placement="auto" title="Editar ejercicio">
                                                <img src="images\btns\editar3.png" style=";width:60px;height:60px;">
                                            </a>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                                            {{ Form::open(['style'=>'margin-bottom: 0px', 'data-toggle'=>'tooltip' ,'data-placement'=>'auto' ,'title'=>'Eliminar ejercicio','method' => 'DELETE', 'route' => ['ejercicios.destroy', $e->id]]) }}
                                            {{ Form::image('images\btns\no2.png', 'name', ['class' => 'btn', 'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();', 'style' => 'width: 60px;height: 60px;padding-bottom: 0px;border-bottom-width: 0px;padding-right: 0px;border-top-width: 0px;padding-top: 0px;padding-left: 0px;border-left-width: 0px;border-right-width: 0px;']) }}
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