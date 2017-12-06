<!-- FORMULARIO DE EDICIÓN DE UN ALIMENTO-->

@extends('layouts.app')
<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Marvel" rel="stylesheet">
<link href="path/to/select2.min.css" rel="stylesheet" />
@section('stylesheets')
    {!!Html::style('css/select2.min.css') !!}
    <!--link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" /-->
@endsection
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</head>
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
        <div class="panel panel-default" style="background-color: transparent; border: 0px; box-shadow: none">
            <!--CABECERA-->
            <div class="panel-heading"style="margin-top:10px;border-radius:5px;border-bottom-width:0px;height: 80px;color: #555555; font-family: 'Satisfy', cursive;background-color: rgb(178, 226, 225);">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center" >
                        <p style="font-size: 40px;text-align: center;margin-bottom: 0px;">
                            Editar alimento</p>
                    </div>
                </div>
            </div>

            <!--CUERPO-->
            <div class="panel-body" style="font-size:20px;font-family: 'Marvel', sans-serif;color: #000000;">
                <form class="form-horizontal" role="form" method="post" action="{{route('alimentos.update',$alimento->id)}}">
                    <input name="_method" type="hidden" value="PUT">
                    {{ csrf_field() }}

                    <div class="row" style="margin-top: 100px">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                            <p for="nombre"   class="text-left"> <strong>Nombre:</strong></p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <input type="text" class="form-control" name="nombre" style="font-size: 20px" value="{{$alimento->nombre}}">
                            @if($errors->has('nombre'))
                                <span style="color: red">{{$errors->first('nombre')}}</span>
                            @endif
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
                            <p for="carbohidratos" class="text-left"><strong>Hidratos (g):</strong></p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <input type="text" class="form-control" name="carbohidratos" style="font-size: 20px" value="{{$alimento->carbohidratos}}">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                            <p for="kcal" class="text-left"><strong>Energía (Kcal):</strong></p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <input type="text" class="form-control" name="kcal" style="font-size: 20px" value="{{$alimento->kcal}}">
                            @if($errors->has('kcal'))
                                <span style="color: red">{{$errors->first('kcal')}}</span>
                            @endif
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
                            <p for="grasas" class="text-left"><strong>Grasas (g):</strong></p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <input type="text" class="form-control" name="grasas" style="font-size: 20px"value=" {{$alimento->grasas}}">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 40px">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-1 col-lg-offset-1 col-sm-offset-1">
                            <p for="proteinas" class="text-left"><strong>Proteinas (g):</strong></p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <input type="text" class="form-control" name="proteinas" style="font-size: 20px" value="{{$alimento->proteinas}}">
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-2 col-lg-offset-2 col-sm-offset-2">
                            <p for="observaciones" class="text-left"><strong>Observaciones:</strong></p>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <input type="text" class="form-control" name="observacion" style="font-size: 20px" value=" {{$alimento->observacion}}">
                        </div>
                    </div>

                    <div class="row" style="margin-top: 50px">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-5 col-lg-offset-5 col-sm-offset-5">
                            <button style="border: none" class="button" type="submit" data-toggle="tooltip" data-toggle="tooltip" data-placement="auto" title="Guardar cambios">
                                <img src="\images\btns\si2.png" style="width: 100px;height: 100px;border: 0px;">
                            </button>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1">
                            <a href="{{route("alimentos.index")}}" data-toggle="tooltip" data-placement="auto" title="Cancelar">
                                <img src="\images\btns\no2.png" style="width: 100px;height: 100px;border: 0px;">
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection