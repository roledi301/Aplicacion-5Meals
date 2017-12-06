<!--MENU PRINCIPAL-->

@extends('layouts.app')
<style>
    .cabecera {
        background-image: url("/images/fondos/ini.jpg");
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
        margin-bottom: 2rem;
    }
</style>
@section('content')
    <div class="container-fluid" >

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 ">
                <div class="cabecera" style="height:60%;"></div>
            </div>
        </div>

        <script>
            $(document).ready(function(){
                $('[data-toggle="tooltip"]').tooltip();
            });
        </script>

        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 ">
                <div class="text-center">
                    <a class="btn" href="{{route('pacientes.create')}}"
                       role="button" data-toggle="tooltip" data-placement="auto" title="Nuevo paciente">
                        <img src="images\btns\crear2.png" style="width:180px;height:180px;border:0;">
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 ">
                <div class="text-center">
                    <a class="btn" href="{{route('pacientes.index')}}" role="button"
                       data-toggle="tooltip" data-placement="auto" title="Registro de pacientes">
                        <img src="images\btns\doc.png" style="width:180px;height:180px;border:0;" >
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 ">
                <div class="text-center">
                    <a class="btn" href="{{route('alimentos.index')}}" role="button"
                       data-toggle="tooltip" data-placement="auto" title="Alimentos">
                        <img src="images\btns\comida.png" style="width:180px;height:180px;border:0;" >
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 ">
                <div class="text-center">
                    <a class="btn" href="{{route('ejercicios.index')}}" role="button"
                       data-toggle="tooltip" data-placement="auto" title="Ejercicios">
                        <img src="images\btns\ejercicio.png" style="width:180px;height:180px;border:0;" >
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection