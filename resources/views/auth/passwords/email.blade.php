@extends('layouts.app')
<link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Marvel" rel="stylesheet">
<style>
    html, body {
        background-image: url("/images/fondos/RecuperarContraseña.jpg");
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
    }
    .container-fluid {
        text-align: -webkit-center;
    }
    .grid-1 {
        display: grid;
        grid-template-columns: 30% 40% 30%;
        grid-template-rows: auto ;
    }
</style>
@section('content')
    <div class="container-fluid">
        <section class="grid-1" style="margin-top: 10%;">
            <div class="item-00"></div>
            <div class="item-00">
                <div class="panel panel-default" style="background-color: rgba(182, 208, 220, 0.53);">
                    <div class="panel-heading" style="border-radius:5px;border-bottom-width:0px;height: 80px;color: #555555; font-family: 'Satisfy', cursive;background-color: rgb(178, 226, 225);">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 text-center">
                                <p  style="font-size: 35px;text-align: center;margin-bottom: 0px;margin-top: 5px">Recuperar contraseña</p>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body" style="font-family: 'Marvel', sans-serif;color: black; font-size: 20px; margin-top: 20px">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="col-md-1 col-lg-1"><p></p></div>
                                <div class="col-md-3 col-lg-3">
                                    <label for="email">E-Mail: </label>
                                </div>
                                <div class="col-lg-5 col-md-5">
                                    <input id="email"  style="font-size: 20px" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" style="font-size: 18px">
                                    Enviar link
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="item-00"></div>
        </section>
    </div>
@endsection
