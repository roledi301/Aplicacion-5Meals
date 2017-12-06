<!--EDICION DE EJERCICIOS-->
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

            <!--MENSAJES-->
            @if(session()-> has('nmsj'))
                <div class="alert alert-danger" role="alert">{{session('nmsj')}}</div>
        @endif

        <!--CABECERA-->
            <div class="panel-heading" style="margin-top:10px;border-radius:5px;border-bottom-width:0px;height: 80px;color: #555555; font-family: 'Satisfy', cursive;background-color: rgb(178, 226, 225);">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                        <p  style="font-size: 40px;text-align: center;margin-bottom: 0px;">Editar ejercicio</p>
                    </div>
                </div>
            </div>

            <!--CUERPO-->
            <div class="panel-body" style="font-family: 'Marvel', sans-serif;color: #000000;">
                <form class="form-horizontal" role="form" method="post" action="{{route('ejercicios.update',$ejercicio->id)}}">
                    <input name="_method" type="hidden" value="PUT">
                    {{ csrf_field() }}

                    <div class="row" style="margin-top: 100px">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-4 col-lg-offset-4 col-sm-offset-4">
                            <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                                <p for="nombre" style="font-size: 20px"><strong>Nombre:</strong></p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <input type="text" class="form-control text-left" name="nombre" style="font-size: 20px" value="{{$ejercicio->nombre}}">
                            @if($errors->has('nombre'))
                                <span style="color: red">{{$errors->first('nombre')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-4 col-lg-offset-4 col-sm-offset-4">
                            <div class="form-group{{ $errors->has('duracion') ? ' has-error' : '' }}">
                                <p for="duracion" style="font-size: 20px"><strong>Duración:</strong></p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <input type="text" class="form-control text-left" name="duracion" style="font-size: 20px"value="{{$ejercicio->duracion}}">
                            @if($errors->has('duracion'))
                                <span style="color: red">{{$errors->first('duracion')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-4 col-lg-offset-4 col-sm-offset-4">
                            <div class="form-group{{ $errors->has('calorias') ? ' has-error' : '' }}">
                                <p for="kcal" style="font-size: 20px"><strong>Calorias:</strong></p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <input type="text" class="form-control text-left" name="calorias" style="font-size: 20px" value="{{$ejercicio->calorias}}">
                            @if($errors->has('calorias'))
                                <span style="color: red">{{$errors->first('calorias')}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row" style="margin-top: 50px">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-5 col-lg-offset-5 col-sm-offset-5">
                            <button style="border: none" class="button" type="submit" data-toggle="tooltip" data-toggle="tooltip" data-placement="auto"
                                    title="Actualizar ejercicio ">
                                <img src="\images\btns\si2.png"style="width: 100px;height: 100px;border: 0px;">
                            </button>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1">
                            <a href="{{route("ejercicios.index")}}" data-toggle="tooltip" data-placement="auto" title="Cancelar">
                                <img src="\images\btns\no2.png" style="width: 100px;height: 100px;border: 0px;">
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection