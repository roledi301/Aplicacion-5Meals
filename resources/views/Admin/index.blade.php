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

        <!--SCRIPT PARA BURBUJAS DE MENSAJES-->
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
                            Registro de usuarios
                        </p>
                    </div>
                    <div class="col-lg-1 col-md-1 col-sm-1" style="margin-top: -10px;text-align: right">
                        <a href="/menu" data-toggle="tooltip" data-placement="auto" title="Volver al menu principal">
                            <img src="\images\btns\volver.png" style="width: 80px;height: 80px;">
                        </a>
                    </div>
                </div>
            </div>


            <!--CUERPO-->
            <div class="panel-body" style="font-family: 'Marvel', sans-serif;color: #000000;">
                <div class="row" style="margin-top: 20px; margin-bottom: 20px">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-md-offset-9 col-lg-offset-9 col-sm-offset-9">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 text-right">
                                {!! Form::open(['route'=>'admin.index','method'=>'GET','class'=>'navbar-form narvar-left pull right','role'=>'search' ])!!}
                                <div class="form-group">
                                    {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Nombre del usuario','style'=>'font-size:20px; width: 250px']) !!}
                                </div>
                                <button class="button " type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="auto"
                                        title="Buscar usuario" style="border: none; padding: 0px">
                                    <img src="\images\btns\buscar.png" style="width: 80px;height: 80px;border: 0px;margin-top: -15px">
                                </button>
                                {!! Form::close()!!}
                            </div>
                        </div>
                    </div>
                </div>

                <!--Tabla-->
                <div class="row text-center" style="text-align: center">
                    <table class="table table-hover" >
                    @if(isset($usuarios))

                        <!--TITULOS-->
                            <thead  align="center" style="text-align: center ;background-color:rgba(111, 225, 224, 0.23); color: black;font-size: 20px;">
                            <th  style="padding: 0px; padding-top: 10px;border-bottom-width: 0px;" class="col-lg-4 col-md-4 col-sm-4 text-center">
                                <p>Nombre</p></th>
                            <th  style="padding: 0px; padding-top: 10px;border-bottom-width: 0px;" class="col-lg-4 col-md-4 col-sm-4 text-center">
                                <p>Email</p></th>
                            <th  style="padding: 0px; padding-top: 10px;border-bottom-width: 0px;" class="col-lg-4 col-md-4 col-sm-4 text-center">
                                <p>Opciones</p></th>
                            </thead>
                            <!--DATOS-->
                            <tbody align="center" style="color: #000000; font-size: 20px">
                            @foreach($usuarios as $u)<!--for-->
                            <tr style="font-size: 20px; align-content: center">
                                <td  style="border-bottom-width: 0px;border-top-width: 0px;" class="col-lg-4 col-md-4 col-sm-4 text-center">
                                    <p style="margin-bottom: 0px;margin-top: 20px;" >{{$u->name}}</p>
                                </td>
                                <td  style="border-bottom-width: 0px;border-top-width: 0px;" class="col-lg-4 col-md-4 col-sm-4 text-center">
                                    <p style="margin-bottom: 0px;margin-top: 20px;" >{{$u->email}}</p>
                                </td>
                                <!--BOTONES-->
                                <td  style="border-bottom-width: 0px;border-top-width: 0px;" class="col-lg-4 col-md-4 col-sm-4 text-center">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                                            <a href="{{route('admin.edit',$u->id)}}" role="button" class="btn" style="padding: 0px; border: none"
                                               data-toggle="tooltip" data-placement="auto" title="Editar usuario">
                                                <img src="\images\btns\editar2.png" style="width:70px;height:70px;border:0;">
                                            </a>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 text-center">
                                            {{ Form::open([ 'data-toggle'=>'tooltip', 'data-placement'=>'auto',
                                             'title'=>'Eliminar usuario','style'=>'margin-bottom: 0px','method' => 'DELETE', 'route' => ['admin.destroy', $u->id]]) }}
                                            {{ Form::image('images\btns\no2.png', 'name', ['class' => 'btn','onclick' => 'if(!confirm("¿Está seguro? Si das de baja al usuario se perderán todos sus datos"))event.preventDefault();', 'style' => 'width: 60px;height: 60px;padding-bottom: 0px;border-bottom-width: 0px;padding-right: 0px;border-top-width: 0px;padding-top: 0px;padding-left: 0px;border-left-width: 0px;border-right-width: 0px;']) }}
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
@endsection