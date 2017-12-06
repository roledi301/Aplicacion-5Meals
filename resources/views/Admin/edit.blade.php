@extends('layouts.app')
<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Marvel" rel="stylesheet">
<link rel="stylesheet" href="/css/app.css">
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
            <div class="panel-heading"style="margin-top:10px;border-radius:5px;border-bottom-width:0px;height: 80px;color: #555555; font-family: 'Satisfy', cursive;background-color: rgb(178, 226, 225);">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 text-center" >
                        <p style="font-size: 40px;text-align: center;margin-bottom: 0px;">
                            Editar usuario</p>
                    </div>
                </div>
            </div>
            <!--CUERPO-->
            <div class="panel-body" style="font-size:18px;font-family: 'Marvel', sans-serif;color: #000000;">

                <form class="form-horizontal" role="form" method="post" action="{{route('admin.update',$usuario->id)}}">
                    <input name="_method" type="hidden" value="PUT">
                    {{ csrf_field() }}

                    <div class="row" style="margin-top: 40px">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 text-left">
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="text-left">Nombre: </label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 ">
                            <input id="name" type="text" style="font-size: 18px;" class="form-control" name="name" value="{{$usuario->name}}" required >
                            @if ($errors->has('name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 text-left">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="text-left">E-Mail: </label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 ">
                            <input id="email" type="email" style="font-size: 18px;" class="form-control" name="email" value="{{$usuario->email}}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 text-left">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="text-left">Contraseña:</label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 ">
                            <input id="password" style="font-size: 18px;" type="password" class="form-control" name="password"  required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 text-left">
                            <div class="form-group">
                                <label for="password-confirm" class="text-left">Repetir contraseña: </label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 ">
                            <input id="password-confirm" style="font-size: 18px;" type="password" class="form-control" name="password_confirmation"  required>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-4 col-lg-offset-4 col-sm-offset-4 text-left">
                            <div class="form-group">
                                <label for="rol" class="text-left">Rol de usuario:  </label>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 ">
                            <select id="rol_id" style="font-size: 18px;" type="select" class="form-control" name="role_id" required>
                                <option name="role_id" value="{{1}}">Administrador</option>
                                <option name="role_id" value="{{2}}">Médico</option>
                            </select>
                        </div>
                    </div>

                    <div class="row" style="margin-top: 50px">
                        <div class="col-lg-1 col-md-1 col-sm-1 col-md-offset-5 col-lg-offset-5 col-sm-offset-5 text-center">
                            <button style="border: none" class="button" type="submit" data-toggle="tooltip" data-toggle="tooltip" data-placement="auto" data-toggle="tooltip" data-placement="auto" title="Actualizar usuario ">
                                <img src="\images\btns\si2.png" style="width: 100px;height: 100px;border: 0px;">
                            </button>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1">
                            <a href="\menuAdmin"data-toggle="tooltip" data-placement="auto" title="Cancelar">
                                <img src="\images\btns\no2.png" style="width: 100px;height: 100px;border: 0px;">
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection